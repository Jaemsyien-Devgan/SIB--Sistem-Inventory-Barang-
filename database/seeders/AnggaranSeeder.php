<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggaranSeeder extends Seeder
{
    public function run()
    {
        $kodeAwal = 1; // Mulai dari 0001
        $jumlahData = 50; // Jumlah data yang akan di-generate

        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode anggaran dengan padding 4 digit angka
            $kodeAnggaran = str_pad($kodeAwal + $i, 4, '0', STR_PAD_LEFT);

            DB::table('anggaran')->insert([
                'kode_anggaran' => $kodeAnggaran,
                'nama_anggaran' => 'Anggaran ' . ($i + 1),
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
