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
        Schema::create('bpb', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_bpb');
            $table->date('tanggal_bpb');
            $table->foreignId('lpb_id')->constrained('lpb')->onDelete('cascade');
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
        Schema::dropIfExists('bpb');
    }
};
