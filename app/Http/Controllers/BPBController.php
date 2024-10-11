<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Bpb;
use App\Models\Lpb;
use App\Models\product;
use App\Models\Satuan;
use App\Models\SubAnggaran;
use App\Models\SubLpb;
use App\Models\supplier;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BPBController extends Controller
{
    public function index()
{
    $lpb = Lpb::with('administrasi.proyek')->get();
    $bpb = Bpb::with('administrasi.proyek')->get();

    $currentMonth = date('m');
    $currentYear = date('Y');

    $generateCode = function ($type, $lpbId) use ($currentMonth, $currentYear) {
        $lpb = Lpb::with('administrasi.proyek')->find($lpbId);
        $projectCode = $lpb && $lpb->administrasi && $lpb->administrasi->proyek
            ? $lpb->administrasi->proyek->kode_proyek
            : 'XXXXX';

        $lastCode = Bpb::whereRaw('SUBSTRING_INDEX(nomor_bpb, "/", -1) = ?', ["{$currentMonth}.{$currentYear}"])
            ->orderBy('id', 'desc')
            ->first();
        $newCounter = $lastCode ? (int)substr($lastCode->nomor_bpb, 0, 5) + 1 : 1;

        $formattedCounter = str_pad($newCounter, 5, '0', STR_PAD_LEFT);
        return "{$formattedCounter}/{$type}/{$projectCode}/{$currentMonth}.{$currentYear}";
    };

    $newBPBCode = $generateCode('LPB', request('lpb_id'));
    $newPPCode = $generateCode('PP', request('lpb_id'));

    $generateBPBCode = function () use ($currentMonth, $currentYear) {
        $queryPP = Lpb::query()->with('administrasi.proyek');
        $lastCode = Bpb::whereRaw('SUBSTRING_INDEX(nomor_bpb, "/", -1) = ?', ["{$currentMonth}.{$currentYear}"])
            ->orderBy('id', 'desc')
            ->first();

        $newCounter = $lastCode ? (int)substr($lastCode->nomor_bpb, 0, 5) + 1 : 1;

        $proyeklpb = $queryPP->where('id', request('lpb_id'))->first();
        $projectCode = $proyeklpb && $proyeklpb->administrasi && $proyeklpb->administrasi->proyek
            ? $proyeklpb->administrasi->proyek->kode_proyek
            : 'XXXXX';

        $formattedCounter = str_pad($newCounter, 5, '0', STR_PAD_LEFT);
        return "{$formattedCounter}/BPB/{$projectCode}/{$currentMonth}.{$currentYear}";
    };

    $newBPBCode = $generateBPBCode();

    return view('BPB.bpb', compact('lpb', 'newBPBCode', 'bpb'));
}
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'tanggal_bpb' => 'required|date',
                'lpb_id' => 'required|exists:lpb,id',
                'tanda_tangan' => 'required|array|max:2',
                'tanda_tangan.*' => 'required|string|max:255',
                'jabatan' => 'required|array|max:2',
                'jabatan.*' => 'required|string|max:255',
            ]);

            $bulanSekarang = date('m');
            $tahunSekarang = date('Y');

            // Fungsi untuk generate kode BPB
            $generateKode = function ($tipe) use ($bulanSekarang, $tahunSekarang, $request) {
                // Ambil BPB terakhir berdasarkan nomor dan bulan/tahun
                $kodeTerakhir = Bpb::whereRaw('SUBSTRING_INDEX(nomor_bpb, "/", -1) = ?', ["{$bulanSekarang}.{$tahunSekarang}"])
                    ->orderBy('id', 'desc')
                    ->first();

                // Tentukan nomor urut baru
                $counterBaru = $kodeTerakhir ? (int)substr($kodeTerakhir->nomor_bpb, 0, 5) + 1 : 1;

                // Ambil kode proyek dari LPB yang berelasi
                $lpb = Lpb::with('administrasi.proyek')->findOrFail($request->lpb_id);
                $kodeProyek = $lpb->administrasi->proyek->kode_proyek ?? 'XXXXX';

                $counterFormat = str_pad($counterBaru, 5, '0', STR_PAD_LEFT);
                return "{$counterFormat}/{$tipe}/{$kodeProyek}/{$bulanSekarang}.{$tahunSekarang}";
            };

            // Generate nomor BPB
            $validated['nomor_bpb'] = $generateKode('BPB');

            // Cek kesesuaian jumlah tanda tangan dan jabatan
            if (count($request->tanda_tangan) !== count($request->jabatan)) {
                return redirect()->back()->with('error', 'Jumlah tanda tangan dan jabatan tidak sama.');
            }

            // Simpan data BPB ke database
            Bpb::create($validated);

            // Redirect dengan pesan sukses
            return redirect()->route('bpb')->with('success', 'BPB berhasil ditambahkan');
        } catch (\Exception $e) {
            // Tangani error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function show($id, Request $request)
    {
        // $bpb = Bpb::with('lpb')->findOrFail($id);
        // $lpb = Lpb::with('administrasi')->findOrFail($bpb->lpb_id);
        // $administrasi = Administrasi::with('subAnggarans')->get(); // Ubah di sini
        // $subAnggarans = SubAnggaran::get();


        $bpb = Bpb::query()->with(['subbpb.sublpb'])->findOrFail($id);
        // dd($order_pembelians);
        $querybpb = $bpb->subbpb();
        // $queryProduk = Produk::query();




        $administrasi = $bpb->lpb->administrasi;
        // $produks = $queryProduk->orderBy($sortField, $sortDirection)->get();

        $sublpb = $bpb->lpb->sublpb;

        return view('BPB.bpb_show', compact('bpb','sublpb','administrasi'));
    }

    public function destroy($id)
    {
        $bpb = Bpb::findOrFail($id);
        $bpb->delete();
        return redirect()->route('bpb')->with('success', 'BPB berhasil dihapus');
    }
}
