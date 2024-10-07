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

        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode produk dengan padding 4 digit angka
            $kodeProduk = str_pad($kodeAwal + $i, 4, '0', STR_PAD_LEFT);

            DB::table('product')->insert([
                'kode_produk' => $kodeProduk, // Membuat kode produk berformat PRDxxxx
                'nama_produk' => 'Produk ' . ($i + 1), // Nama produk dinamis
                'satuan_id'   => $i + 1, // Menghubungkan ke tabel `satuan` secara langsung
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
