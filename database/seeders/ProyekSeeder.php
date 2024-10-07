<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyekSeeder extends Seeder
{
    public function run()
    {
        $kodeAwal = 1; // Mulai dari 0001
        $jumlahData = 50; // Jumlah data yang akan di-generate

        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode proyek dengan padding 4 digit angka
            $kodeProyek = str_pad($kodeAwal + $i, 4, '0', STR_PAD_LEFT);

            DB::table('proyek')->insert([
                'kode_proyek' => $kodeProyek, // Membuat kode proyek berformat PRJxxxx
                'nama_proyek' => 'Proyek ' . ($i + 1), // Nama proyek dinamis
                'start_date'  => now()->addDays(rand(0, 30)), // Menghasilkan tanggal mulai dalam 30 hari ke depan
                'status'      => $i % 2 == 0 ? 'aktif' : 'tidak_aktif', // Status bergantian antara aktif dan tidak aktif
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
