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
        Schema::create('data_pengajuan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_pengajuan_id')->constrained('data_pengajuans')->cascadeOnDelete();
            $table->boolean('bersungguh_sungguh');
            $table->boolean('belum_menerima_bantuan');
            $table->boolean('upah_minimum');
            $table->boolean('bekerja_berkelompok');
            $table->boolean('data_confirmation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengajuan_details');
    }
};
