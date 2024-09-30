<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai 'per_page' dari session atau request
        $perPage = $request->input('per_page', session('per_page', 5));
        session(['per_page' => $perPage]);

        // Ambil nilai pencarian dari input search
        $search = $request->input('search');
        $query = Anggaran::query();
        $lastKodeAnggaran = Anggaran::orderBy('kode_Anggaran', 'desc')->first();
        if ($lastKodeAnggaran) {
            $nextKodeAnggaran = str_pad($lastKodeAnggaran->kode_anggaran + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeAnggaran = '0001';
        }

        // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_anggaran', 'like', "%{$search}%")
                    ->orWhere('nama_anggaran', 'like', "%{$search}%");
            });
        }

        // Cek apakah perPage adalah -1, jika iya, ambil semua data
        if ($perPage == -1) {
            $anggarans = $query->get(); // Ambil semua data
        } else {
            $anggarans = $query->paginate($perPage); // Pagination
        }

        return view('anggaran', compact('anggarans', 'nextKodeAnggaran'));
    }



    public function create()
    {
        return view('anggaran.create');
    }

    public function store(Request $request)
{
    // Custom messages untuk validasi
    $messages = [
        'nama_anggaran.unique' => 'Nama anggaran sudah terdaftar, silakan gunakan nama yang berbeda.',
        'nama_anggaran.required' => 'Nama anggaran wajib diisi.',
    ];

    // Validasi dengan custom error messages
    $validated = $request->validate([
        'kode_anggaran' => 'required|unique:anggaran',
        'nama_anggaran' => 'required|unique:anggaran',

    ], $messages);

    // Jika validasi lolos, buat satuan baru
    try {
        Anggaran::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('anggaran.index')->with('success', 'Anggaran berhasil ditambahkan!');
    } catch (\Exception $e) {
        // Menangani jika ada error saat menyimpan data
        return redirect()->route('anggaran.create')->with('error', 'Terjadi kesalahan saat menambahkan Anggaran. Silakan coba lagi.');
    }
}


    public function destroy(Anggaran $anggaran)
    {
        $anggaran->delete();
        return redirect()->route('anggaran.index')->with('success', 'Data Anggaran berhasil dihapus');
    }

    public function edit($id)
    {
        $anggaran = Anggaran::findOrFail($id);
        return view('anggaran.edit', compact('anggaran'));
    }

    public function update(Request $request, $id)
    {
        $anggaran = Anggaran::findOrFail($id);

        $messages = [
            'nama_anggaran.unique' => 'Nama anggaran sudah terdaftar, silakan gunakan nama yang berbeda.',
            'nama_anggaran.required' => 'Nama anggaran wajib diisi.',
            'nama_anggaran.min' => 'Nama anggaran minimal 3 karakter.',
        ];
        $validatedData = $request->validate([
            'kode_anggaran' => 'required|unique:anggaran',
            'nama_anggaran' => 'required|unique:anggaran|min:3',
        ], $messages);

        $anggaran->update($validatedData);

        return redirect()->route('anggaran.index')->with('success', 'Data Anggaran berhasil diperbarui');
    }
}
