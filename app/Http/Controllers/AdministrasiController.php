<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Anggaran;
use App\Models\Proyek;
use App\Models\Satuan;
use App\Models\SubAnggaran;
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
                $q->where('kode_proyek', 'like', "%{$search}%")
                    ->orWhere('nama_proyek', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");

                // Mencari berdasarkan relasi anggaran
                $q->orWhereHas('anggaran', function ($query) use ($search) {
                    $query->where('nama_anggaran', 'like', "%{$search}%");
                });
            });
        }

        $status = $request->input('status');
        if ($status) {
            if ($status === 'aktif') {
                // Jika status berupa string atau boolean
                $query->where(function ($q) {
                    $q->where('status', true)
                        ->orWhere('status', 'aktif')
                        ->orWhere('status', 1);
                });
            } elseif ($status === 'tidak_aktif') {
                $query->where(function ($q) {
                    $q->where('status', false)
                        ->orWhere('status', 'tidak_aktif')
                        ->orWhere('status', 0);
                });
            }
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
        $messages = [
            'kode_proyek.required' => 'Kode proyek harus diisi.',
            'nama_proyek.required' => 'Nama proyek harus diisi.',
            'status.required' => 'Status proyek harus diisi.',
            'proyek_id.required' => 'Proyek harus dipilih.',
            'kode_proyek.unique' => 'Kode proyek sudah terdaftar.',
            'nama_proyek.unique' => 'Nama proyek sudah terdaftar.',
            'proyek_id.exists' => 'Proyek yang dipilih tidak ditemukan.', // Ganti sesuai nama tabel

        ];

        $validate = $request->validate([
            'kode_proyek' => 'required|unique:administrasi',
            'nama_proyek' => 'required|unique:administrasi',
            'status' => 'required',
            'proyek_id' => 'required|exists:proyek,id', // Ganti sesuai nama tabel
        ], $messages);


        Administrasi::create($validate);
        return redirect()->route('Administrasi.administrasi')->with('success', 'Data Administrasi berhasil ditambahkan.');
    }
    public function destroy(Administrasi $administrasi)
    {
        $administrasi->delete();
        return redirect()->route('Administrasi.administrasi')->with('success', 'Data Administrasi  berhasil dihapus');
    }

    public function edit($id)
    {
        $administrasi = Administrasi::findOrFail($id);
        return view('Administrasi.administrasi.edit', compact('administrasi'));
    }
    public function show($id)
    {
        $administrasi = Administrasi::findOrFail($id);
        $subAnggarans = $administrasi->subAnggarans;
        $anggarans = Anggaran::all();
        $satuan = Satuan::all();
        $lastKodeAnggaran = SubAnggaran::orderBy('kode_anggaran', 'desc')->first();
        if ($lastKodeAnggaran) {
            $nextKodeAnggaran = str_pad($lastKodeAnggaran->kode_anggaran + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeAnggaran = '0001';
        }
        return view('Administrasi.show', compact('administrasi', 'subAnggarans', 'satuan', 'nextKodeAnggaran','anggarans'));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'kode_proyek.required' => 'Kode proyek harus diisi.',
            'nama_proyek.required' => 'Nama proyek harus diisi.',
            'status.required' => 'Status proyek harus diisi.',
        ];

        $validate = $request->validate([
            'kode_proyek' => 'required',
            'nama_proyek' => 'required',
            'status' => 'required',
        ], $messages);

        $administrasi = Administrasi::findOrFail($id);
        $administrasi->update($validate);

        return redirect()->route('Administrasi.administrasi')->with('success', 'Data Administrasi berhasil diubah.');
    }
}
