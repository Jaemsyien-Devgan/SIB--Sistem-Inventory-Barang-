<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sub_anggarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administrasi_id')->constrained('administrasi'); // Foreign key untuk proyek
            $table->string('kode_anggaran');
            $table->string('nama_anggaran');
            $table->foreignId('satuan_id')->constrained('satuan'); // Foreign key untuk satuan
            $table->integer('kuantitas');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('jumlah_harga', 15, 2)->virtualAs('kuantitas * harga_satuan'); // Menyimpan total harga
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_anggarans');
    }
};
