<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_lpb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lpb_id')->constrained('lpb')->onDelete('cascade');
            $table->foreignId('sub_anggaran_id')->constrained('sub_anggarans')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('product')->onDelete('cascade');
            $table->integer('kuantitas');
            $table->string('spesifikasi');
            $table->string('deskripsi');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('jumlah_harga', 15, 2)->virtualAs('kuantitas * harga_satuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_lpb');
    }
};
