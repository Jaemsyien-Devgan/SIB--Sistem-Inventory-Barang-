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

class LPBController extends Controller
{
    public function index()
    {
        $administrasi = Administrasi::all();
        $transaksi = Transaksi::all();
        $supplier = Supplier::all();
        $lpb = Lpb::all();

        $currentMonth = date('m'); // Mendapatkan bulan saat ini
        $currentYear = date('Y');  // Mendapatkan tahun saat ini

        // Fungsi umum untuk menghasilkan kode
        $generateCode = function ($type, $administrasiId) use ($currentMonth, $currentYear) {
            $administrasi = Administrasi::with('proyek')->find($administrasiId);
            $projectCode = $administrasi && $administrasi->proyek ? $administrasi->proyek->kode_proyek : 'XXXXX';

            // Cari nomor OP terakhir berdasarkan bulan dan tahun saat ini
            $lastCode = Lpb::whereRaw('SUBSTRING_INDEX(nomor_op, "/", -1) = ?', ["{$currentMonth}.{$currentYear}"])
                ->orderBy('id', 'desc')
                ->first();

            // Hitung nomor urut baru
            $newCounter = $lastCode ? (int)substr($lastCode->nomor_op, 0, 5) + 1 : 1;

            // Format kode baru
            $formattedCounter = str_pad($newCounter, 5, '0', STR_PAD_LEFT);
            return "{$formattedCounter}/{$type}/{$projectCode}/{$currentMonth}.{$currentYear}";
        };

        // Panggil fungsi untuk mendapatkan kode baru
        $newLPBCode = $generateCode('LPB', request('administrasi_id'));
        $newPPCode = $generateCode('PP', request('administrasi_id'));

        $generateOPCode = function () use ($currentMonth, $currentYear) {
            $queryPP = Administrasi::query()->with('proyek');
            $lastCode = Lpb::whereRaw('SUBSTRING_INDEX(nomor_op, "/", -1) = ?', ["{$currentMonth}.{$currentYear}"])
                ->orderBy('id', 'desc')
                ->first();

            $newCounter = $lastCode ? (int)substr($lastCode->nomor_op, 0, 5) + 1 : 1;

            $proyekadministrasi = $queryPP->where('id', request('administrasi_id'))->first();
            $projectCode = $proyekadministrasi && $proyekadministrasi->proyek ? $proyekadministrasi->proyek->kode_proyek : 'XXXXX';

            $formattedCounter = str_pad($newCounter, 5, '0', STR_PAD_LEFT);
            return "{$formattedCounter}/OP/{$projectCode}/{$currentMonth}.{$currentYear}";
        };

        $newOPCode = $generateOPCode();

        return view('LPB.lpb', compact('administrasi', 'transaksi', 'newLPBCode', 'newPPCode', 'supplier', 'newOPCode', 'lpb'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'tanggal_lpb' => 'required|date',
                'administrasi_id' => 'required|exists:administrasi,id',
                'transaksi_id' => 'required|exists:transaksi,id',
                'supplier_id' => 'required|exists:supplier,id',
                'tanda_tangan' => 'required|array',
                'tanda_tangan.*' => 'required|string|max:255',
                'jabatan' => 'required|array',
                'jabatan.*' => 'required|string|max:255',
            ]);

            $currentMonth = date('m');
            $currentYear = date('Y');

            $generateCode = function ($type) use ($currentMonth, $currentYear) {
                $lastCode = Lpb::whereRaw('SUBSTRING_INDEX(nomor_op, "/", -1) = ?', ["{$currentMonth}.{$currentYear}"])
                    ->orderBy('id', 'desc')
                    ->first();

                $newCounter = $lastCode ? (int)substr($lastCode->nomor_op, 0, 5) + 1 : 1;
                $proyekadministrasi = Administrasi::with('proyek')->where('id', request('administrasi_id'))->first();
                $projectCode = $proyekadministrasi && $proyekadministrasi->proyek ? $proyekadministrasi->proyek->kode_proyek : 'XXXXX';

                $formattedCounter = str_pad($newCounter, 5, '0', STR_PAD_LEFT);
                return "{$formattedCounter}/{$type}/{$projectCode}/{$currentMonth}.{$currentYear}";
            };

            $validated['nomor_op'] = $generateCode('OP');
            $validated['nomor_lpb'] = $generateCode('LPB');
            $validated['nomor_pp'] = $generateCode('PP');

            if (count($request->tanda_tangan) !== count($request->jabatan)) {
                return redirect()->back()->with('error', 'Jumlah tanda tangan dan jabatan tidak sama.');
            }

            Lpb::create($validated);

            return redirect()->route('lpb')->with('success', 'LPB berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function show($id)
    {

        $lpb = Lpb::findOrFail($id);
        $sub_lpb = $lpb->sublpb()->get();
        // dd($sub_lpb->toArray());
        $administrasi = Administrasi::all();
        $supplier = supplier::all();
        $transaksi = Transaksi::all();
        $satuan = Satuan::all();
        $subAnggarans = SubAnggaran::all();
        $product = product::all(); // Mendapatkan semua produk

        $grandTotal = $sub_lpb->sum('jumlah_harga');

        return view('LPB.lpb_show', compact('grandTotal', 'sub_lpb', 'lpb', 'supplier', 'transaksi', 'administrasi', 'product', 'satuan', 'subAnggarans'));
    }

    public function destroy($id)
    {
        $lpb = Lpb::findOrFail($id);
        $lpb->delete();
        return redirect()->route('lpb')->with('success', 'LPB berhasil dihapus');
    }
}
