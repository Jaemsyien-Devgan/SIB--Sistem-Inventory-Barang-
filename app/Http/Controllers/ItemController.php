<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Item;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai 'per_page' dari session atau request
        $perPage = $request->input('per_page', session('per_page', 5));
        session(['per_page' => $perPage]);

        // Ambil nilai pencarian dari input search
        $search = $request->input('search');
        $query = Item::query();
        $lastKodeItem = Item::orderBy('kode_item', 'desc')->first();
        if ($lastKodeItem) {
            $nextKodeItem = str_pad($lastKodeItem->kode_item + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeItem = '0001';
        }

        // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_item', 'like', "%{$search}%")
                    ->orWhere('nama_item', 'like', "%{$search}%");
            });
        }

        // Cek apakah perPage adalah -1, jika iya, ambil semua data
        if ($perPage == -1) {
            $items = $query->get(); // Ambil semua data
        } else {
            $items = $query->paginate($perPage); // Pagination
        }

        return view('item', compact('items', 'nextKodeItem'));
    }



    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
{
    // Custom messages untuk validasi
    $messages = [
        'nama_item.unique' => 'Nama transaksi sudah terdaftar, silakan gunakan nama yang berbeda.',
        'nama_item.required' => 'Nama transaksi wajib diisi.',
    ];

    // Validasi dengan custom error messages
    $validated = $request->validate([
        'kode_item' => 'required|unique:item',
        'nama_item' => 'required|unique:item',

    ], $messages);

    // Jika validasi lolos, buat transaksi baru
    try {
        Item::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('item.index')->with('success', 'item berhasil ditambahkan!');
    } catch (\Exception $e) {
        // Menangani jika ada error saat menyimpan data
        return redirect()->route('item.create')->with('error', 'Terjadi kesalahan saat menambahkan item. Silakan coba lagi.');
    }
}


    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')->with('success', 'Data item berhasil dihapus');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);


        $validatedData = $request->validate([
            'kode_item' => 'required',
            'nama_item' => 'required|min:3',
        ]);

        $item->update($validatedData);

        return redirect()->route('item.index')->with('success', 'Data item berhasil diperbarui');
    }
}
