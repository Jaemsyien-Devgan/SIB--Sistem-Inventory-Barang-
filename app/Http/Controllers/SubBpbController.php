<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Bpb;
use App\Models\Lpb;
use App\Models\product;
use App\Models\Satuan;
use App\Models\SubAnggaran;
use App\Models\SubBpb;
use App\Models\supplier;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class SubBpbController extends Controller
{
    public function index($id)
{
    $bpb = Bpb::findOrFail($id);
    $sub_bpb = SubBpb::all();
    $supplier = supplier::all();
    $satuan = Satuan::all();
    $subAnggarans = SubAnggaran::all();
    $product = product::all();
    $administrasi = Administrasi::with('subAnggarans')->get(); // Ubah di sini
    $lpb = Lpb::findOrFail($bpb->lpb_id);

    return view('BPB.sub-bpb', compact('administrasi','bpb','lpb', 'product', 'sub_bpb', 'subAnggarans', 'supplier', 'satuan'));
}
    public function create()
    {
        return view('BPB.sub-bpb-create');
    }
    public function store(Request $request, $id)
    {
        try {
            $Bpb = Bpb::findOrFail($id);
            $validatedData = $request->validate([
                'sub_lpb_id' => 'required|exists:sub_lpb,id|unique:sub_bpb,sub_lpb_id'
            ]);

            $validatedData['bpb_id'] = $Bpb->id;

            // Step 7: Create a new SubLpb record
            $subbpb = SubBpb::create($validatedData);

            // Step 8: Redirect to the LPB page with success message
            return redirect()->route('BPB.bpb_show', ['id' => $subbpb->bpb_id])
                ->with('success', 'Sub BPB berhasil ditambahkan');
        } catch (\Exception $e) {
            // Step 9: Handle any unexpected exceptions
            return redirect()->back()->with('error', 'Data sub BPB gagal ditambahkan: ' . $e->getMessage());
        }
    }
}
