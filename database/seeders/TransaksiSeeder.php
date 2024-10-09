<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $jumlahData = 50; // Jumlah data yang akan di-generate

        // Daftar nama transaksi yang lebih spesifik
        $namaTransaksiList = [
            'Pembelian Excavator', 'Penyewaan Bulldozer', 'Penjualan Dump Truck', 'Pembelian Traktor',
            'Penyewaan Crane', 'Penjualan Wheel Loader', 'Pembelian Backhoe Loader', 'Penyewaan Asphalt Paver',
            'Penjualan Motor Grader', 'Pembelian Compactor', 'Penyewaan Skid Steer Loader', 'Penjualan Tower Crane',
            'Pembelian Mobile Crane', 'Penyewaan Forklift', 'Penjualan Trailer', 'Pembelian Articulated Dump Truck',
            'Penyewaan Generator Set', 'Penjualan Hydraulic Hammer', 'Pembelian Vibratory Roller', 'Penyewaan Pneumatic Roller',
            'Penjualan Tandem Roller', 'Pembelian Asphalt Plant', 'Penyewaan Concrete Mixer', 'Penjualan Concrete Pump',
            'Pembelian Crawler Loader', 'Penyewaan Crawler Dozer', 'Penjualan Hydraulic Excavator', 'Pembelian Scraper',
            'Penyewaan Wheel Dozer', 'Penjualan Concrete Batching Plant', 'Pembelian Off-Highway Truck', 'Penyewaan Articulated Truck',
            'Penjualan Water Tank Truck', 'Pembelian Lowboy Trailer', 'Penyewaan Mini Excavator', 'Penjualan Compact Track Loader',
            'Pembelian Telehandler', 'Penyewaan Material Handler', 'Penjualan Soil Compactor', 'Pembelian Tandem Compactor',
            'Penyewaan Cold Planer', 'Penjualan Asphalt Distributor', 'Pembelian Hydraulic Breaker', 'Penyewaan Dump Trailer',
            'Penjualan Rock Drill', 'Pembelian Vibrating Screen', 'Penyewaan Jaw Crusher', 'Penjualan Impact Crusher',
            'Pembelian Conveying Equipment', 'Penyewaan Tower Crane'
        ];

        // Loop untuk membuat 50 data
        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode transaksi dengan padding 4 digit angka dan awalan "TRX"
            $kodeTransaksi = 'TRX' . str_pad($i + 1, 4, '0', STR_PAD_LEFT);

            DB::table('transaksi')->insert([
                'kode_transaksi' => $kodeTransaksi, // Membuat kode transaksi berformat TRXxxxx
                'nama_transaksi' => $namaTransaksiList[$i], // Nama transaksi diambil dari daftar nama transaksi
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
