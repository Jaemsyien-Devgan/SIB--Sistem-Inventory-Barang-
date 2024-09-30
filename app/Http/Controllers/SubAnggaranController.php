<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Anggaran;
use App\Models\Satuan;
use App\Models\SubAnggaran;
use Illuminate\Http\Request;

class SubAnggaranController extends Controller
{
    public function index(Request $request, $id)
{
    $perPage = $request->input('per_page', session('per_page', 5));
    session(['per_page' => $perPage]);
    // Ambil data administrasi berdasarkan ID
    $administrasi = Administrasi::findOrFail($id);
    $search = $request->input('search');
    $anggarans = Anggaran::all();
    $query = SubAnggaran::query();
    $satuan = Satuan::all();
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('kode_proyek', 'like', "%{$search}%")
                ->orWhere('nama_proyek', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");

            // Mencari berdasarkan relasi anggaran
            $q->orWhereHas('anggaran', function ($query) use ($search) {
                $query->where('nama_anggaran', 'like', "%{$search}%");
            });
        });
    }
    $lastKodeAnggaran = SubAnggaran::orderBy('kode_anggaran', 'desc')->first();
        if ($lastKodeAnggaran) {
            $nextKodeAnggaran = str_pad($lastKodeAnggaran->kode_anggaran + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeAnggaran = '0001';
        }

    // Ambil semua sub_anggarans terkait dengan administrasi ini
    $subAnggarans = SubAnggaran::where('administrasi_id', $id)->get();

    // Jika tidak ada sub_anggarans ditemukan, kita bisa menampilkan pesan di tampilan
    return view('Administrasi.sub_anggaran', compact('administrasi', 'subAnggarans', 'anggarans','satuan','nextKodeAnggaran'));
}



    public function store(Request $request)
{
    $request->validate([
        'administrasi_id' => 'required|exists:administrasi,id',
        'kode_anggaran' => 'required|string|max:255',
        'nama_anggaran' => 'required|string|max:255|unique:sub_anggarans',
        'anggaran_id' => 'required|exists:anggaran,id', // Ganti sesuai nama tabel
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
        'anggaran_id' => $request->anggaran_id,
        'satuan_id' => $request->satuan_id,
        'kuantitas' => $request->kuantitas,
        'harga_satuan' => $request->harga_satuan,

    ]);

    return redirect()->back()->with('success', 'Sub Anggaran berhasil ditambahkan!');
}
public function destroy(SubAnggaran $subAnggaran)
{
    $subAnggaran->delete();

    return redirect()->route('Administrasi.show', $subAnggaran->administrasi_id)
        ->with('success', 'Sub Anggaran berhasil dihapus');
}
}
