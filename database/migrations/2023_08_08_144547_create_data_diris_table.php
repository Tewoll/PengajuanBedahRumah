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
        Schema::create('data_diris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama');
            $table->string('nik', 16);
            $table->string('tempat_lahir', 30);
            $table->date('tanggal_lahir');
            $table->string('phone', 15);
            $table->string('whatsapp', 15);
            $table->enum('agama', ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha', 'Konghucu']);
            $table->enum('status_perkawinan', ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->foreignId('village_id')->constrained('villages');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->foreignId('district_id')->constrained('districts');
            $table->foreignId('regency_id')->constrained('regencies');
            $table->foreignId('province_id')->constrained('provinces');
            $table->string('negara', 30);
            $table->string('kode_pos', 10);
            $table->string('pendidikan_terakhir', 20);
            $table->string('pekerjaan', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_diris');
    }
};
