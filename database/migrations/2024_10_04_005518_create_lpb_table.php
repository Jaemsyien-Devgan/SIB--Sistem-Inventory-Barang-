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
        Schema::create('lpb', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_lpb');
            $table->date('tanggal_lpb');
            $table->string('nomor_op');
            $table->string('nomor_pp');
            $table->foreignId('administrasi_id')->constrained('administrasi')->onDelete('cascade');
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('supplier')->onDelete('cascade');
            $table->string('tanda_tangan');
            $table->string('jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpb');
    }
};
