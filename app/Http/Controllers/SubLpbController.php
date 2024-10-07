<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Lpb;
use App\Models\product;
use App\Models\Satuan;
use App\Models\SubAnggaran;
use App\Models\SubLpb;
use App\Models\supplier;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SubLpbController extends Controller
{
    public function index($id)
    {
        $lpb = Lpb::findOrFail($id);
        $sub_lpb = SubLpb::all();
        $supplier = supplier::all();
        $transaksi = Transaksi::all();
        $satuan = Satuan::all();
        $subAnggarans = SubAnggaran::all();
        $product = product::all(); //
        $administrasi = Administrasi::findOrFail($id);
        return view('LPB.sub-lpb', compact('administrasi','product','sub_lpb','product','subAnggarans','supplier','transaksi','satuan'));
    }
    public function create()
    {
        return view('LPB.sub-lpb-create');
    }
    public function store(Request $request)
{
    try {
        // Step 1: Validate the input fields
        $validatedData = $request->validate([
            'lpb_id' => 'required|exists:lpb,id',
            'sub_anggaran_id' => 'required|exists:sub_anggarans,id',
            'product_id' => 'required|exists:product,id',
            'kuantitas' => 'required|integer|min:1',
            'spesifikasi' => 'required',
            'deskripsi' => 'required',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        // Step 2: Retrieve SubAnggaran based on administrasi_id_id
        $subAnggaran = SubAnggaran::where('id', $validatedData['sub_anggaran_id'])->first();

        // Step 3: Check if SubAnggaran is not found
        if (!$subAnggaran) {
            return redirect()->back()->with('error', 'Sub Anggaran tidak ditemukan.');
        }

        // Step 4: Check if requested quantity exceeds available quantity
        if ($validatedData['kuantitas'] > $subAnggaran->kuantitas) {
            return redirect()->back()->with('error', 'Jumlah kuantitas melebihi stok yang tersedia.');
        }

        // Step 5: Decrease the quantity in SubAnggaran
        $subAnggaran->kuantitas -= $validatedData['kuantitas'];
        $subAnggaran->save();

        // Step 6: Calculate jumlah_harga
        $jumlah_harga = $validatedData['kuantitas'] * $validatedData['harga_satuan'];

        // Step 7: Create a new SubLpb record
        $sublpb = SubLpb::create([
            'lpb_id' => $validatedData['lpb_id'],
            'sub_anggaran_id' => $validatedData['sub_anggaran_id'],
            'product_id' => $validatedData['product_id'],
            'kuantitas' => $validatedData['kuantitas'],
            'spesifikasi' => $validatedData['spesifikasi'],
            'harga_satuan' => $validatedData['harga_satuan'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Step 8: Redirect to the LPB page with success message
        return redirect()->route('LPB.lpb_show', ['id' => $sublpb->lpb_id])
            ->with('success', 'Sub LPB berhasil ditambahkan dan kuantitas diperbarui.');

    } catch (\Exception $e) {
        // Step 9: Handle any unexpected exceptions
        return redirect()->back()->with('error', 'Data sub LPB gagal ditambahkan: ' . $e->getMessage());
    }
}

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
