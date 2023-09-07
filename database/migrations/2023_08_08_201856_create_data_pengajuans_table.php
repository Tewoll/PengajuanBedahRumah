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
        Schema::create('data_pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('admin_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->enum('status_data', [
                'Data Pengajuan Baru',
                'Data Perlu Perbaikan',
                'Data Ditolak',
                'Data Disetujui'
            ])->default('Data Pengajuan Baru');
            $table->enum('status_proses', [
                'Verifikasi Data',
                'Verifikasi Lapangan',
                'Persetujuan',
                'Selesai'
            ])->default('Verifikasi Data');
            $table->enum('status_pengajuan', [
                'Disetujui',
                'Ditolak'
            ])->nullable();
            $table->text('keterangan');
            $table->timestamp('submitted_at');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengajuans');
    }
};
