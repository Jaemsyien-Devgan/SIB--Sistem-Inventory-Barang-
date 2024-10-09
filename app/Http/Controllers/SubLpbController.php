<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
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
        return view('LPB.sub-lpb', compact('administrasi', 'product', 'sub_lpb', 'product', 'subAnggarans', 'supplier', 'transaksi', 'satuan'));
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
                'administrasi_id' =>'required|exists:administrasi,id',
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
            if ($request->input('kuantitas') > $subAnggaran->kuantitas) {
                return redirect()->back()->with('error', 'Jumlah kuantitas melebihi stok yang tersedia.');
            }

            // Step 5: Decrease the quantity in SubAnggaran
            $subAnggaran->kuantitas -= $request->input('kuantitas');
            $subAnggaran->save();

            // Step 6: Calculate jumlah_harga
            // $jumlah_harga = $validatedData['kuantitas'] * $validatedData['harga_satuan'];

            // Step 7: Create a new SubLpb record
            $sublpb = SubLpb::create($validatedData);

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
        // Step 1: Temukan entri SubLpb yang akan dihapus
        $sublpb = SubLpb::findOrFail($id);

        // Step 2: Ambil SubAnggaran yang terkait
        $subAnggaran = SubAnggaran::findOrFail($sublpb->sub_anggaran_id);

        // Step 3: Tambahkan kembali kuantitas ke SubAnggaran
        $subAnggaran->kuantitas += $sublpb->kuantitas;
        $subAnggaran->save();

        // Step 4: Hapus entri SubLpb
        $sublpb->delete();

        // Step 5: Redirect dengan pesan sukses
        return redirect()->route('LPB.lpb_show', $sublpb->lpb_id)
            ->with('success', 'Sub LPB berhasil dihapus dan kuantitas pada Sub Anggaran diperbarui.');
    }


    public function generatePDF($id, Request $request)
{
    // Fetch LPB along with its relationships
    $lpb = Lpb::with(['supplier', 'sublpb'])
        ->findOrFail($id);

    // Get limit and sorting preferences from the request
    $limit = $request->input('limit', null); // Number of sub LPBs to print, null means all
    $sortField = $request->input("sort_field", 'created_at');
    $sortDirection = $request->input("sort_direction", "desc");

    // Sum the total price of sub LPBs
    // $total_jumlah_harga = $lpb->sublpb()->sum('total_sub_lpb');

    // Query sub LPBs with sorting
    $querySubAnggarans = $lpb->sublpb()
        ->orderBy($sortField, $sortDirection);

    // Apply limit if present
    if ($limit) {
        $sublpb = $querySubAnggarans->take($limit)->get();
    } else {
        $sublpb = $querySubAnggarans->get();
    }

    // Sum total prices for the fetched sub LPBs
    $total_jumlah_harga = $sublpb->sum('jumlah_harga');

    // Prepare data for the PDF view
    $data = [
        'lpb' => $lpb,
        'sublpb' => $sublpb, // Fixed typo here
        'total_jumlah_harga' => $total_jumlah_harga,
    ];

    // Generate PDF from the view
    $pdf = PDF::loadView('LPB.PDF_template', $data)
        ->setPaper('a4', 'landscape'); // Fixed 'portrait' typo

    // Return the generated PDF as a stream
    return $pdf->stream('sub_lpb.pdf');

}

}

