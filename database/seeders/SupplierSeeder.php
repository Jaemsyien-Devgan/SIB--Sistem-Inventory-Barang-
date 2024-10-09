<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $jumlahData = 50; // Jumlah data yang akan di-generate

        // Daftar nama dan alamat supplier yang lebih relevan
        $namaSupplierList = [
            'PT. Alat Berat Nusantara', 'CV. Mekar Jaya', 'PT. Konstruksi Mandiri', 'PT. Tambang Sejahtera', 'CV. Mesin Perkasa',
            'PT. Cahaya Pembangunan', 'PT. Sumber Daya Mineral', 'PT. Teknik Karya', 'PT. Beton Maju', 'CV. Sinar Terang',
            'PT. Baja Kuat', 'PT. Logistik Utama', 'PT. Pipa Nasional', 'CV. Bahan Bangunan', 'PT. Perkasa Jaya',
            'PT. Daya Angkat', 'PT. Mesin Industri', 'PT. Material Konstruksi', 'CV. Transportasi Alat', 'PT. Jasa Tambang',
            'PT. Energi Abadi', 'CV. Sukses Bersama', 'PT. Industri Baja', 'PT. Bumi Nusantara', 'PT. Global Teknik',
            'PT. Surya Perkasa', 'PT. Alat Konstruksi', 'PT. Beton Sejahtera', 'CV. Mesin Terang', 'PT. Sumber Karya',
            'PT. Karya Tambang', 'CV. Konstruksi Bangunan', 'PT. Teknik Perkasa', 'PT. Tambang Maju', 'CV. Sumber Energi',
            'PT. Logistik Tambang', 'PT. Bahan Teknik', 'PT. Baja Perkasa', 'PT. Sinar Pembangunan', 'CV. Alat Angkat',
            'PT. Bumi Konstruksi', 'PT. Perkasa Nusantara', 'PT. Material Nusantara', 'CV. Cahaya Teknik', 'PT. Mesin Konstruksi',
            'PT. Konstruksi Beton', 'PT. Tambang Abadi', 'PT. Sumber Teknik', 'CV. Perkasa Abadi', 'PT. Daya Sejahtera'
        ];

        // Loop untuk membuat 50 data
        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode supplier dengan padding 4 digit angka dan awalan "SUP"
            $kodeSupplier = 'SUP' . str_pad($i + 1, 4, '0', STR_PAD_LEFT);

            DB::table('supplier')->insert([
                'kode_supplier'    => $kodeSupplier, // Membuat kode supplier berformat SUPxxxx
                'nama_supplier'    => $namaSupplierList[$i], // Nama supplier diambil dari daftar nama supplier
                'alamat_supplier'  => 'Jl. Raya Industri No.' . ($i + 1), // Alamat supplier dinamis
                'telepon_supplier' => '08' . mt_rand(10000000, 99999999), // Menghasilkan nomor telepon acak
                'status'           => $i % 2 == 0 ? 'aktif' : 'tidak_aktif', // Status bergantian antara aktif dan tidak aktif
                'tanggal_bergabung' => now()->subDays(rand(0, 365)), // Tanggal bergabung dalam rentang 1 tahun ke belakang
                'tanggal_berakhir' => now()->addDays(rand(30, 365)), // Tanggal berakhir dalam rentang 30 hari hingga 1 tahun ke depan
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
