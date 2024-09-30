<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Satuan;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
         // Ambil nilai 'per_page' dari session atau request
         $perPage = $request->input('per_page', session('per_page', 5));
         session(['per_page' => $perPage]);

         // Ambil nilai pencarian dari input search
         $search = $request->input('search');
         $query = product::query();
         $satuan = Satuan::all();
         $lastKodeProduct = product::orderBy('kode_produk', 'desc')->first();
         if ($lastKodeProduct) {
             $nextKodeProduct = str_pad($lastKodeProduct->kode_produk + 1, 4, '0', STR_PAD_LEFT);
         } else {
             $nextKodeProduct = '0001';
         }

         // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
         if ($search) {
             $query->where(function ($q) use ($search) {
                 $q->where('kode_produk', 'like', "%{$search}%")
                     ->orWhere('nama_produk', 'like', "%{$search}%")
                     ->orWhere('harga', 'like', "%{$search}%")
                     ->orWhere('satuan_id', 'like', "%{$search}%");
             });
         }

         // Cek apakah perPage adalah -1, jika iya, ambil semua data
         if ($perPage == -1) {
             $products = $query->get(); // Ambil semua data
         } else {
             $products = $query->paginate($perPage); // Pagination
         }

         return view('product', compact('satuan','products', 'nextKodeProduct'));
    }
    public function create()
    /**
     * Display a form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    {

    }

    public function store(Request $request)
    {
        $messages = [
            'kode_produk.required' => 'Kode produk harus diisi.',
            'kode_produk.unique' => 'Kode produk sudah digunakan.',
            'nama_produk.required' => 'Nama produk harus diisi.',
            'nama_produk.unique' => 'Nama produk sudah digunakan.',
            'nama_produk.min' => 'Nama produk minimal 3 karakter.',
            'nama_produk.max' => 'Nama produk maksimal 50 karakter.',
           'satuan_id.required' => 'Satuan produk harus dipilih.',

        ];
        $validate = $request->validate([
            'kode_produk' => 'required|unique:product',
            'nama_produk' => 'required|unique:product|min:3|max:50',
            'satuan_id' => 'required|exists:satuan,id', // Ganti sesuai nama tabel
        ], $messages);
        // dd($validate);

        Product::create($validate);
        return redirect()->route('product')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('product')->with('success', 'Product berhasil dihapus');
    }

    public function edit($id)
    {
        $product = product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = product::findOrFail($id);

        $validatedData = $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'satuan_id' => 'required',
        ]);

        $product->update($validatedData);

        return redirect()->route('product')->with('success', 'Data product berhasil diperbarui');
    }
}
