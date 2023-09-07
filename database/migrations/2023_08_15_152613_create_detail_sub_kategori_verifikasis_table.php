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
        Schema::create('detail_sub_kategori_verifikasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_ktgr_verifikasi_id')->constrained('sub_kategori_verifikasis')->cascadeOnDelete();
            $table->text('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sub_kategori_verifikasis');
    }
};
