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
            $table->foreignId(column:'administrasi_id')->constrained('administrasi')->onDelete('cascade'); // Foreign key untuk proyek
            $table->foreignId(column:'product_id')->constrained('product')->onDelete('cascade');
            $table->foreignId(column:'anggaran_id')->constrained('anggaran')->onDelete('cascade');
            $table->string(column:'no_detail',length:4)->unique();
            $table->integer(column:'kuantitas');
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
