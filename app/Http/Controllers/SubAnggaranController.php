<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\SubAnggaran;
use Illuminate\Http\Request;

class SubAnggaranController extends Controller
{
    public function index($id)
{
    // Ambil data administrasi berdasarkan ID
    $administrasi = Administrasi::findOrFail($id);

    // Ambil semua sub_anggarans terkait dengan administrasi ini
    $subAnggarans = SubAnggaran::where('administrasi_id', $id)->get();

    // Jika tidak ada sub_anggarans ditemukan, kita bisa menampilkan pesan di tampilan
    return view('Administrasi.sub_anggaran', compact('administrasi', 'subAnggarans'));
}



    public function store(Request $request)
{
    $request->validate([
        'administrasi_id' => 'required|exists:administrasi,id',
        'kode_anggaran' => 'required|string|max:255',
        'nama_anggaran' => 'required|string|max:255',
        'satuan_id' => 'required|exists:satuan,id',
        'kuantitas' => 'required|numeric|min:1',
        'harga_satuan' => 'required|numeric|min:0',
    ]);

    // Hitung jumlah harga


    // Simpan data sub anggaran
    SubAnggaran::create([
        'administrasi_id' => $request->administrasi_id,
        'kode_anggaran' => $request->kode_anggaran,
        'nama_anggaran' => $request->nama_anggaran,
        'satuan_id' => $request->satuan_id,
        'kuantitas' => $request->kuantitas,
        'harga_satuan' => $request->harga_satuan,

    ]);

    return redirect()->back()->with('success', 'Sub Anggaran berhasil ditambahkan!');
}
}
