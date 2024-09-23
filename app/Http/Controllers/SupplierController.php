<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', session('per_page', 5));
        session(['per_page' => $perPage]);

        // Ambil nilai pencarian dari input search
        $search = $request->input('search');
        $query = supplier::query();

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
                $q->where('kode_supplier', 'like', "%{$search}%")
                    ->orWhere('nama_supplier', 'like', "%{$search}%")
                    ->orWhere('alamat_supplier', 'like', "%{$search}%")
                    ->orWhere('telepon_supplier', 'like', "%{$search}%")
                    ->orWhere('tanggal_bergabung', 'like', "%{$search}%")
                    ->orWhere('tanggal_berakhir', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        // Cek apakah perPage adalah -1, jika iya, ambil semua data
        if ($perPage == -1) {
            $suppliers = $query->get(); // Ambil semua data
        } else {
            $suppliers = $query->paginate($perPage); // Pagination
        }
        return view('supplier', compact('suppliers'));
    }
    public function create()
    {
        return view('supplier.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_supplier' => 'required|unique:supplier',
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'telepon_supplier' => 'required|numeric',
            'tanggal_bergabung' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'status' => 'required|in:aktif,tidak_aktif',

        ]);

        supplier::create($validated);

        return redirect()->route('supplier')->with('success', 'supplier added successfully');
    }
    public function destroy(supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier')->with('success', 'supplier berhasil dihapus');
    }

    public function edit($id)
    {
        $supplier = supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = supplier::findOrFail($id);

        $validatedData = $request->validate([
            'kode_supplier' => 'required',
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'telepon_supplier' => 'required|numeric',
            'tanggal_bergabung' => 'required',
            'tanggal_berakhir' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        $supplier->update($validatedData);

        return redirect()->route('supplier')->with('success', 'Data supplier berhasil diperbarui');
    }
}
