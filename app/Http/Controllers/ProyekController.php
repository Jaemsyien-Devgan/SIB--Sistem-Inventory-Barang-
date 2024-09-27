<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', session('per_page', 5));
        session(['per_page' => $perPage]);

        // Ambil nilai pencarian dari input search
        $search = $request->input('search');
        $query = Proyek::query();
        $lastKodeProyek = Proyek::orderBy('kode_proyek', 'desc')->first();
        if ($lastKodeProyek) {
            $nextKodeProyek = str_pad($lastKodeProyek->kode_proyek + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeProyek = '0001';
        }

        $status = $request->input('status');
        if ($status) {
            if ($status === 'aktif') {
                $query->where('status', true)
                    ->orWhere('status', 'aktif')
                    ->orWhere('status', 1);
            } elseif ($status === 'tidak_aktif') {
                $query->where('status', false)
                    ->orWhere('status', 'tidak_aktif')
                    ->orWhere('status', 0);
            }
        }

        // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_proyek', 'like', "%{$search}%")
                    ->orWhere('nama_proyek', 'like', "%{$search}%")
                    ->orWhere('start_date', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        // Cek apakah perPage adalah -1, jika iya, ambil semua data
        if ($perPage == -1) {
            $proyeks = $query->get(); // Ambil semua data
        } else {
            $proyeks = $query->paginate($perPage); // Pagination
        }
        return view('proyek', compact('proyeks', 'nextKodeProyek'));
    }
    public function create()
    {
        return view('proyek.create');
    }
    public function store(Request $request)
    {
        $messages = [
            'kode_proyek.unique' => 'Kode proyek sudah terdaftar, silakan gunakan kode yang berbeda.',
            'nama_proyek.required' => 'Nama proyek wajib diisi.',
            'nama_proyek.min' => 'Nama proyek minimal 5 karakter.',
            'nama_proyek.max' => 'Nama proyek maksimal 255 karakter.',
           'start_date.required' => 'Tanggal mulai wajib diisi.',
           'status.required' => 'Status wajib dipilih.',
           'status.in' => 'Status harus aktif atau tidak aktif.',
           'start_date.date' => 'Tanggal mulai harus dalam format tanggal.',

        ];

        $validated = $request->validate([
            'kode_proyek' => 'required|unique:proyek',
            'nama_proyek' => 'required|min:5|max:255',
            'start_date' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
        ], $messages);

        Proyek::create($validated);

        return redirect()->route('proyek')->with('success', 'Proyek added successfully');
    }
    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return redirect()->route('proyek')->with('success', 'proyek berhasil dihapus');
    }

    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.edit', compact('proyek'));
    }

    public function update(Request $request, $id)
    {
        $proyek = Proyek::findOrFail($id);

        $validatedData = $request->validate([
            'kode_proyek' => 'required',
            'nama_proyek' => 'required',
            'start_date' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        $proyek->update($validatedData);

        return redirect()->route('proyek')->with('success', 'Data Proyek berhasil diperbarui');
    }
}
