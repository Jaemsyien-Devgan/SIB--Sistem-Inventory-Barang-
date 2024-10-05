<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Anggaran;
use App\Models\product;
use App\Models\Satuan;
use App\Models\SubAnggaran;
use Illuminate\Http\Request;

class SubAnggaranController extends Controller
{
    public function index(Request $request, $id)
{
    $administrasi = Administrasi::findOrFail($id);
    $search = $request->input('search');
    $anggarans = Anggaran::all();
    $product = Product::all();  // Fetch products correctly

    $query = SubAnggaran::query();
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('product_id', 'like', "%{$search}%")
                ->orWhere('nama_anggaran', 'like', "%{$search}%")
                ->orWhere('satuan', 'like', "%{$search}%")
                ->orWhere('anggaran_id', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        });
    }

    $subAnggarans = SubAnggaran::where('administrasi_id', $id)->get();
    $subtotal = $subAnggarans->sum('harga_satuan');
    $grandTotal = $subAnggarans->sum('jumlah_harga');

    return view('Administrasi.sub_anggaran', compact(
        'administrasi',
        'subAnggarans',
        'satuan',
        'subtotal',
        'grandTotal',
        'products',  // Pass the products to the view
        'anggarans'
    ));
}


public function store(Request $request)
{
    try {
        // Validasi input berdasarkan kolom yang ada di tabel migrations
        $request->validate([
            'no_detail' => 'required|numeric|unique:sub_anggarans',
            'administrasi_id' => 'required|exists:administrasi,id',
            'product_id' => 'required|exists:product,id',
            'kuantitas' => 'required|numeric|min:1',
            'harga_satuan' => 'required|numeric|min:0',
            'anggaran_id' => 'required|exists:anggaran,id',
        ]);

        // Dapatkan kode detail terakhir
        $lastKodeDetail = SubAnggaran::orderBy('no_detail', 'desc')->first();
        if ($lastKodeDetail) {
            $nextKodeDetail = str_pad($lastKodeDetail->no_detail + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextKodeDetail = '0001';
        }

        // Menyimpan data sub anggaran ke database
        $subAnggarans = SubAnggaran::create([
            'no_detail' => $nextKodeDetail,
            'administrasi_id' => $request->administrasi_id,
            'product_id' => $request->product_id,
            'kuantitas' => $request->kuantitas,
            'harga_satuan' => $request->harga_satuan,
            'anggaran_id' => $request->anggaran_id,
        ]);

        // Dapatkan administrasi_id untuk redirect
        $administrasi_id = $subAnggarans->administrasi_id;

        // Redirect ke halaman Administrasi dengan pesan sukses
        return redirect()->route('Administrasi.show', ['id' => $administrasi_id])
            ->with(['success' => 'Sub anggaran berhasil ditambahkan.', 'nextKodeDetail' => $nextKodeDetail]);

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Data sub anggaran gagal ditambahkan: ' . $e->getMessage());
    }
}




    public function destroy($id)
    {
        $subAnggarans = SubAnggaran::find($id);
        $subAnggarans->delete();

        return redirect()->route('Administrasi.show', $subAnggarans->administrasi_id)
            ->with('success', 'Sub Anggaran berhasil dihapus');
    }

    public function edit($id)
    {
        $subAnggarans = SubAnggaran::find($id);
        $anggarans = Anggaran::all();
        $product= product::all();

        if (!$subAnggarans) {
            return redirect()->back()->with('error', 'Sub Anggaran tidak ditemukan!');
        }

        return view('Administrasi.sub_anggaran.edit', compact('subAnggarans', 'anggarans', 'product'));
    }

    public function update(Request $request, $id)
{
    try {
        // Temukan sub anggaran berdasarkan ID
        $subAnggarans = SubAnggaran::findOrFail($id); // Menggunakan findOrFail untuk menangani jika tidak ditemukan

        // Validasi input
        $request->validate([
            'no_detail' => 'required',
            'product_id' => 'required',
            'anggaran_id' => 'required',
            'kuantitas' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
        ]);

        // Update model sub anggaran
        $subAnggarans->update($request->only([
            'no_detail',
            'product_id',
            'anggaran_id',
            'kuantitas',
            'harga_satuan',
        ]));

        // Redirect dengan pesan sukses
        return redirect()->route('Administrasi.show', $subAnggarans->administrasi_id)
            ->with('success', 'Sub Anggaran berhasil diupdate!');
    } catch (\Throwable $th) {
        // Redirect dengan pesan error jika ada kesalahan
        return redirect()->back()->with('error', 'Sub Anggaran gagal diupdate! ' . $th->getMessage());
    }
}

}
