<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $kodeAwal = 1; // Mulai dari 0001
        $jumlahData = 50; // Jumlah data yang akan di-generate

        // Daftar nama produk yang relevan untuk perusahaan alat berat
        $namaProdukList = [
            'Excavator', 'Bulldozer', 'Dump Truck', 'Loader', 'Crane',
            'Forklift', 'Grader', 'Backhoe', 'Hydraulic Hammer', 'Skid Steer Loader',
            'Concrete Mixer', 'Compactor', 'Tower Crane', 'Wheel Loader', 'Mini Excavator',
            'Roller', 'Asphalt Paver', 'Trencher', 'Motor Grader', 'Concrete Pump',
            'Pile Driver', 'Cranes Truck', 'Mobile Crusher', 'Sand Washing Machine', 'Vibratory Roller',
            'Concrete Batch Plant', 'Asphalt Plant', 'Concrete Finisher', 'Horizontal Boring Machine', 'Hydraulic Breaker',
            'Cutter Suction Dredger', 'Grinder', 'Water Pump', 'Boom Lift', 'Drilling Rig',
            'Rock Drill', 'Vibratory Plate', 'Pneumatic Roller', 'Caterpillar Tractor', 'Wheel Tractor Scraper',
            'Cold Planer', 'Tractor', 'Electric Generator', 'Mobile Crane', 'Crawler Loader',
            'Pipe Layer', 'Tunneling Machine', 'Concrete Cutter', 'Stone Crusher', 'Hydraulic Pile Hammer'
        ];

        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode produk dengan padding 4 digit angka dan awalan "PRD"
            $kodeProduk = 'PRD' . str_pad($kodeAwal + $i, 4, '0', STR_PAD_LEFT);

            DB::table('product')->insert([
                'kode_produk' => $kodeProduk, // Membuat kode produk berformat PRDxxxx
                'nama_produk' => $namaProdukList[$i], // Mengambil nama produk dari daftar
                'satuan_id'   => $i + 1, // Menghubungkan ke tabel `satuan` secara langsung
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
