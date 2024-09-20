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

    // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('kode_satuan', 'like', "%{$search}%")
              ->orWhere('nama_satuan', 'like', "%{$search}%")
              ->orWhere('singkatan', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%");
        });
    }

    // Pagination
    $satuans = $query->paginate($perPage);

    return view('satuan', compact('satuans'));
}


    public function create()
    {
        return view('satuan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_satuan' => 'required|unique:satuan',
            'nama_satuan' => 'required',
            'singkatan' => 'required',
            'deskripsi' => 'required',
        ]);

        Satuan::create($validated);

        return redirect()->route('satuan.index')->with('success', 'Satuan added successfully');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus');
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
