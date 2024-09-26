<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Proyek;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index(Request $request)
{
    // Ambil nilai 'per_page' dari session atau request
    $perPage = $request->input('per_page', session('per_page', 5));
    session(['per_page' => $perPage]);

    // Ambil nilai pencarian dari input search
    $search = $request->input('search');
    $query = Administrasi::query();
    $proyek = Proyek::all();



    // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('kode_proyek', 'like', "%{$search}%");
            // Tambahkan kolom lain jika diperlukan
        });
    }

    // Cek apakah perPage adalah -1, jika iya, ambil semua data
    if ($perPage == -1) {
        $administrasis = $query->get(); // Ambil semua data
    } else {
        $administrasis = $query->paginate($perPage); // Pagination
    }

    return view('Administrasi.administrasi', compact('administrasis', 'proyek'));
}
public function store(Request $request)
    {
        $validate = $request->validate([

            'proyek_id' => 'required|exists:proyek,id', // Ganti sesuai nama tabel
        ]);
        // dd($validate);

        Administrasi::create($request->all());
        return redirect()->route('Administrasi.administrasi')->with('success', 'Produk berhasil ditambahkan.');
    }
}
