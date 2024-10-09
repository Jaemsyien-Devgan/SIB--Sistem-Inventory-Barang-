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

        // Daftar nama satuan dan singkatannya
        $satuanList = [
            ['nama' => 'Unit', 'singkatan' => 'UNIT'],
            ['nama' => 'Kilogram', 'singkatan' => 'KG'],
            ['nama' => 'Liter', 'singkatan' => 'L'],
            ['nama' => 'Meter Kubik', 'singkatan' => 'M3'],
            ['nama' => 'Ton', 'singkatan' => 'TON'],
            ['nama' => 'Set', 'singkatan' => 'SET'],
            ['nama' => 'Pcs', 'singkatan' => 'PCS'],
            ['nama' => 'Meter', 'singkatan' => 'M'],
            ['nama' => 'Jam', 'singkatan' => 'HR'],
            ['nama' => 'Hari', 'singkatan' => 'DAY'],
            // Tambahkan lebih banyak satuan jika diperlukan
        ];

        // Loop untuk membuat 50 data
        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode satuan dengan padding 4 digit angka dan awalan "SAT"
            $kodeSatuan = 'SAT' . str_pad($kodeAwal + $i, 4, '0', STR_PAD_LEFT);

            // Ambil nama satuan dan singkatan dari daftar satuan, gunakan modulo untuk pengulangan jika jumlah satuan kurang dari 50
            $satuan = $satuanList[$i % count($satuanList)];

            DB::table('satuan')->insert([
                'kode_satuan' => $kodeSatuan, // Membuat kode satuan berformat SATxxxx
                'nama_satuan' => $satuan['nama'], // Nama satuan diambil dari daftar
                'singkatan'   => $satuan['singkatan'], // Singkatan diambil dari daftar
                'deskripsi'   => 'Deskripsi untuk satuan ' . $satuan['nama'], // Deskripsi dinamis berdasarkan nama satuan
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
