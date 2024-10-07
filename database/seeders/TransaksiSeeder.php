<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $jumlahData = 50; // Jumlah data yang akan di-generate

        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode transaksi dengan padding 4 digit angka
            $kodeTransaksi = str_pad($i + 1, 4, '0', STR_PAD_LEFT);

            DB::table('transaksi')->insert([
                'kode_transaksi' => $kodeTransaksi, // Membuat kode transaksi berformat TRXxxxx
                'nama_transaksi' => 'Transaksi ' . ($i + 1), // Nama transaksi dinamis
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
