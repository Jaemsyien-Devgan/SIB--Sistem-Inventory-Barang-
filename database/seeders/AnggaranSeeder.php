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

        // Daftar kategori anggaran
        $kategoriAnggaran = [
            'Pemeliharaan', 'Pembelian', 'Bahan Bakar', 'Sewa', 'Pengangkutan',
            'Pelatihan', 'Asuransi', 'Penggantian', 'Perbaikan', 'Proyek Tambahan'
        ];

        // Daftar detail anggaran yang relevan
        $detailAnggaran = [
            'Alat Berat', 'Sparepart', 'Kendaraan', 'Komponen', 'Mesin',
            'Ban', 'Operator', 'Kontraktor', 'Proyek', 'Manajemen'
        ];

        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode anggaran dengan padding 4 digit angka
            $kodeAnggaran = str_pad($kodeAwal + $i, 4, '0', STR_PAD_LEFT);

            // Membuat nama anggaran dengan menggabungkan kategori dan detail secara acak
            $namaAnggaran = $kategoriAnggaran[array_rand($kategoriAnggaran)] . ' ' . $detailAnggaran[array_rand($detailAnggaran)];

            DB::table('anggaran')->insert([
                'kode_anggaran' => $kodeAnggaran,
                'nama_anggaran' => $namaAnggaran,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
