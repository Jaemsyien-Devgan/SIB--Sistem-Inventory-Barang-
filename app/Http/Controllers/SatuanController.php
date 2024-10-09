<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai 'per_page' dari session atau request
        $perPage = $request->input('per_page', session('per_page', 5));
        session(['per_page' => $perPage]);

        // Ambil nilai pencarian dari input search
        $search = $request->input('search');
        $query = Satuan::query();
        $lastKodeSatuan = Satuan::orderBy('kode_satuan', 'desc')->first();

        if ($lastKodeSatuan) {
            // Ekstrak angka dari kode satuan
            $lastNumber = intval(substr($lastKodeSatuan->kode_satuan, 3));
            $nextNumber = $lastNumber + 1;
            $nextKodeSatuan = 'SAT' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeSatuan = 'SAT0001';
        };

        // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_satuan', 'like', "%{$search}%")
                    ->orWhere('nama_satuan', 'like', "%{$search}%")
                    ->orWhere('singkatan', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // Cek apakah perPage adalah -1, jika iya, ambil semua data
        if ($perPage == -1) {
            $satuans = $query->get(); // Ambil semua data
        } else {
            $satuans = $query->paginate($perPage); // Pagination
        }

        return view('satuan', compact('satuans', 'nextKodeSatuan'));
    }



    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request)
{
    // Custom messages untuk validasi
    $messages = [
        'nama_satuan.unique' => 'Nama satuan sudah terdaftar, silakan gunakan nama yang berbeda.',
        'nama_satuan.required' => 'Nama satuan wajib diisi.',
        'singkatan.required' => 'Singkatan wajib diisi.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'singkatan.max' => 'Singkatan maksimal 5 karakter.',
        'deskripsi.min' => 'Deskripsi minimal 5 karakter.',
    ];

    // Validasi dengan custom error messages
    $validated = $request->validate([
        'kode_satuan' => 'required|unique:satuan',
        'nama_satuan' => 'required|unique:satuan',
        'singkatan' => 'required|max:5',
        'deskripsi' => 'required|min:5',
    ], $messages);

    // Jika validasi lolos, buat satuan baru
    try {
        Satuan::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan!');
    } catch (\Exception $e) {
        // Menangani jika ada error saat menyimpan data
        return redirect()->route('satuan.create')->with('error', 'Terjadi kesalahan saat menambahkan satuan. Silakan coba lagi.');
    }
}


    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Data Satuan berhasil dihapus');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::findOrFail($id);

        $validatedData = $request->validate([
            'kode_satuan' => 'required',
            'nama_satuan' => 'required',
            'singkatan' => 'required',
            'deskripsi' => 'required',
        ]);

        $satuan->update($validatedData);

        return redirect()->route('satuan.index')->with('success', 'Data satuan berhasil diperbarui');
    }
}
