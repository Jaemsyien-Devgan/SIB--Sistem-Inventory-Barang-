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

        // Daftar nama proyek yang relevan untuk perusahaan alat berat
        $namaProyekList = [
            'Pembangunan Jalan Tol', 'Proyek Bendungan', 'Proyek Bandara', 'Pembangunan Gedung Perkantoran', 'Proyek Pelabuhan',
            'Proyek Pertambangan', 'Pembangunan Jembatan', 'Penggalian Terowongan', 'Proyek Reklamasi', 'Pembangunan Pabrik',
            'Proyek Tambang Batu Bara', 'Pembangunan Pembatas Jalan', 'Proyek Rel Kereta Api', 'Proyek Energi Geotermal', 'Proyek Pembangkit Listrik',
            'Proyek Penambangan Minyak', 'Pembangunan Dermaga', 'Pembangunan Kawasan Industri', 'Proyek Instalasi Air', 'Pembangunan Terminal Bus',
            'Proyek Stasiun Kereta', 'Pembangunan Fasilitas Olahraga', 'Proyek Pembangunan Perumahan', 'Proyek Konstruksi Komersial', 'Proyek Renovasi Gedung',
            'Pembangunan Jalan Raya', 'Proyek Drainase Kota', 'Proyek Pembatas Laut', 'Proyek Pengelolaan Sampah', 'Proyek Perbaikan Infrastruktur Kota',
            'Proyek Rekonstruksi Gempa', 'Pembangunan Menara Telekomunikasi', 'Proyek Pembangunan Perkantoran Modern', 'Proyek Konstruksi Jalan Desa', 'Proyek PLTU',
            'Pembangunan Taman Kota', 'Proyek Pemeliharaan Jalan', 'Proyek Penanganan Banjir', 'Proyek Pengelolaan Limbah', 'Proyek Pembangunan Area Komersial',
            'Proyek Jaringan Irigasi', 'Proyek Pembangunan Apartemen', 'Proyek Pengembangan Kawasan Wisata', 'Proyek Sistem Pengairan', 'Pembangunan Jalur Evakuasi',
            'Proyek Penambangan Emas', 'Proyek Pembangunan Bendungan Air', 'Proyek Pembangunan Rumah Sakit', 'Proyek Pembangunan Pasar', 'Proyek Pembangunan Taman Hiburan'
        ];

        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode proyek dengan padding 4 digit angka dan awalan "PRJ"
            $kodeProyek = 'PRJ' . str_pad($kodeAwal + $i, 4, '0', STR_PAD_LEFT);

            DB::table('proyek')->insert([
                'kode_proyek' => $kodeProyek, // Membuat kode proyek berformat PRJxxxx
                'nama_proyek' => $namaProyekList[$i], // Mengambil nama proyek dari daftar
                'start_date'  => now()->addDays(rand(0, 30)), // Menghasilkan tanggal mulai dalam 30 hari ke depan
                'status'      => $i % 2 == 0 ? 'aktif' : 'tidak_aktif', // Status bergantian antara aktif dan tidak aktif
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
