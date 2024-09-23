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
        return view('proyek', compact('proyeks'));
    }
    public function create()
    {
        return view('proyek.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_proyek' => 'required|unique:proyek',
            'nama_proyek' => 'required',
            'start_date' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

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
