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
        $lastKodeSupplier = supplier::orderBy('kode_supplier', 'desc')->first();
        if ($lastKodeSupplier) {
            // Ekstrak angka dari kode proyek
            $lastNumber = intval(substr($lastKodeSupplier->kode_supplier, 3));
            $nextNumber = $lastNumber + 1;
            $nextKodeSupplier = 'SPR' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeSupplier = 'SPR0001';
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
        return view('supplier', compact('suppliers', 'nextKodeSupplier'));
    }
    public function create()
    {
        return view('supplier.create');
    }
    public function store(Request $request)
    {
        $messages = [
            'kode_supplier.required' => 'Kode supplier harus diisi',
            'kode_supplier.unique' => 'Kode supplier sudah ada',
            'nama_supplier.required' => 'Nama supplier harus diisi',
            'alamat_supplier.required' => 'Alamat supplier harus diisi',
            'telepon_supplier.required' => 'Telepon supplier harus diisi',
            'telepon_supplier.numeric' => 'Telepon supplier harus berupa angka',
            'tanggal_bergabung.required' => 'Tanggal bergabung harus diisi',
            'tanggal_bergabung.date' => 'Tanggal bergabung harus berupa tanggal',
            'tanggal_berakhir.required' => 'Tanggal berakhir harus diisi',
            'tanggal_berakhir.date' => 'Tanggal berakhir harus berupa tanggal',
            'status.required' => 'Status harus diisi',
            'status.in' => 'Status harus aktif atau tidak aktif',
            'kode_supplier.unique' => 'Kode supplier sudah ada',
            'nama_supplier.unique' => 'Nama supplier sudah ada',
            'nama_supplier.min' => 'Nama supplier harus minimal 5 karakter',
        ];
        $validate = $request->validate([
            'kode_supplier' => 'required|unique:supplier',
            'nama_supplier' => 'required|unique:supplier|min:5',
            'alamat_supplier' => 'required',
            'telepon_supplier' => 'required|numeric',
            'tanggal_bergabung' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'status' => 'required|in:aktif,tidak_aktif',

        ], $messages);

        supplier::create($validate);
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
