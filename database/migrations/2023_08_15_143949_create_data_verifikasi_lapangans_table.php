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
        Schema::create('data_verifikasi_lapangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_pengajuan_id')->constrained('data_pengajuans')->cascadeOnDelete();
            $table->foreignId('verifikasi_lanjutan_id')->constrained('verifikasi_lanjutans')->cascadeOnDelete();
            $table->foreignId('sub_kategori_id')->constrained('sub_kategori_verifikasis')->cascadeOnDelete();
            $table->string('ket');
            $table->string('det_ket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_verifikasi_lapangans');
    }
};
