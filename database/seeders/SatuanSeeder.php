<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kodeAwal = 1; // Mulai dari 0001
        $jumlahData = 50; // Jumlah data yang akan di-generate

        // Loop untuk membuat 50 data
        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode satuan dengan padding 4 digit angka
            $kodeSatuan = str_pad($kodeAwal + $i, 4, '0', STR_PAD_LEFT);

            DB::table('satuan')->insert([
                'kode_satuan' => $kodeSatuan, // Membuat kode satuan berformat SATxxxx
                'nama_satuan' => 'Satuan ' . ($i + 1), // Nama satuan dinamis
                'singkatan'   => strtoupper(str_pad($i + 1, 3, '0', STR_PAD_LEFT)), // Singkatan dengan 3 digit angka
                'deskripsi'   => 'Deskripsi untuk satuan ' . ($i + 1), // Deskripsi dinamis
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
