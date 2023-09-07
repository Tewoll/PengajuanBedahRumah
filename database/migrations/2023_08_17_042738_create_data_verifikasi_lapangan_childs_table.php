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
        Schema::create('data_verifikasi_lapangan_childs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_pengajuan_id')->constrained('data_pengajuans')->cascadeOnDelete();
            $table->foreignId('verifikasi_lanjutan_id')->constrained('verifikasi_lanjutans')->cascadeOnDelete();
            $table->foreignId('detail_sub_ktgr_id')->constrained('detail_sub_kategori_verifikasis')->cascadeOnDelete();
            $table->string('ket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_verifikasi_lapangan_childs');
    }
};
