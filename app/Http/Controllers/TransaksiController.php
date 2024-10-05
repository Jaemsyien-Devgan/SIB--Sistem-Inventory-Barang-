<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai 'per_page' dari session atau request
        $perPage = $request->input('per_page', session('per_page', 5));
        session(['per_page' => $perPage]);

        // Ambil nilai pencarian dari input search
        $search = $request->input('search');
        $query = Transaksi::query();
        $lastKodeTransaksi = Transaksi::orderBy('kode_Transaksi', 'desc')->first();
        if ($lastKodeTransaksi) {
            $nextKodeTransaksi = str_pad($lastKodeTransaksi->kode_transaksi + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeTransaksi = '0001';
        }

        // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_transaksi', 'like', "%{$search}%")
                    ->orWhere('nama_transaksi', 'like', "%{$search}%");
            });
        }

        // Cek apakah perPage adalah -1, jika iya, ambil semua data
        if ($perPage == -1) {
            $transaksis = $query->get(); // Ambil semua data
        } else {
            $transaksis = $query->paginate($perPage); // Pagination
        }

        return view('transaksi', compact('transaksis', 'nextKodeTransaksi'));
    }



    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
{
    // Custom messages untuk validasi
    $messages = [
        'nama_transaksi.unique' => 'Nama transaksi sudah terdaftar, silakan gunakan nama yang berbeda.',
        'nama_transaksi.required' => 'Nama transaksi wajib diisi.',
    ];

    // Validasi dengan custom error messages
    $validated = $request->validate([
        'kode_transaksi' => 'required|unique:transaksi',
        'nama_transaksi' => 'required|unique:transaksi',

    ], $messages);

    // Jika validasi lolos, buat transaksi baru
    try {
        Transaksi::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('transaksi.index')->with('success', 'transaksi berhasil ditambahkan!');
    } catch (\Exception $e) {
        // Menangani jika ada error saat menyimpan data
        return redirect()->route('transaksi.create')->with('error', 'Terjadi kesalahan saat menambahkan transaksi. Silakan coba lagi.');
    }
}


    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil dihapus');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);


        $validatedData = $request->validate([
            'kode_transaksi' => 'required',
            'nama_transaksi' => 'required|min:3',
        ]);

        $transaksi->update($validatedData);

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi berhasil diperbarui');
    }
}
