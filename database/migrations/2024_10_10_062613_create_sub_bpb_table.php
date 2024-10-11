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
        Schema::create('sub_bpb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bpb_id')->constrained('bpb')->onDelete('cascade');
            $table->foreignId('sub_lpb_id')->constrained('sub_lpb')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_bpb');
    }
};
