<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $jumlahData = 50; // Jumlah data yang akan di-generate

        for ($i = 0; $i < $jumlahData; $i++) {
            // Format kode supplier dengan padding 4 digit angka
            $kodeSupplier = str_pad($i + 1, 4, '0', STR_PAD_LEFT);

            DB::table('supplier')->insert([
                'kode_supplier'    => $kodeSupplier, // Membuat kode supplier berformat SUPxxxx
                'nama_supplier'    => 'Supplier ' . ($i + 1), // Nama supplier dinamis
                'alamat_supplier'  => 'Alamat ' . ($i + 1), // Alamat supplier dinamis
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
