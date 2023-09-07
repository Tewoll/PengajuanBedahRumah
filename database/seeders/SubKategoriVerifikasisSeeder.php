<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubKategoriVerifikasisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subKategoriVerifikasis = [
            ['kategori_verifikasi_id'=> '1', 'nama' => 'Jenis Rumah / Bangunan'],
            ['kategori_verifikasi_id'=> '1', 'nama' => 'Jenis Rumah Berdasarkan Struktur'],
            ['kategori_verifikasi_id'=> '2', 'nama' => 'Kondisi Fondasi'],
            ['kategori_verifikasi_id'=> '2', 'nama' => 'Kondisi Sloof / Balok Bawah '],
            ['kategori_verifikasi_id'=> '2', 'nama' => 'Kondisi Kolom / Tiang'],
            ['kategori_verifikasi_id'=> '2', 'nama' => 'Kondisi Ring Balok/Balok Atas'],
            ['kategori_verifikasi_id'=> '2', 'nama' => 'Kondisi Struktur Atap'],
            ['kategori_verifikasi_id'=> '3', 'nama' => 'Material Penutup Atap Terluas'],
            ['kategori_verifikasi_id'=> '3', 'nama' => 'Material Dinding Terluas (bagian luar)'],
            ['kategori_verifikasi_id'=> '3', 'nama' => 'Material Lantai Terluas'],
            ['kategori_verifikasi_id'=> '4', 'nama' => 'Jendela / Bukaan Cahaya'],
            ['kategori_verifikasi_id'=> '4', 'nama' => 'Ventilasi'],
            ['kategori_verifikasi_id'=> '4', 'nama' => 'MCK'],
            ['kategori_verifikasi_id'=> '4', 'nama' => 'Tangki Septik'],
            ['kategori_verifikasi_id'=> '5', 'nama' => 'Jumlah Penghuni'],
            ['kategori_verifikasi_id'=> '5', 'nama' => 'Luas Bangunan'],
            ['kategori_verifikasi_id'=> '5', 'nama' => 'Jumlah Kamar Tidur'],
            ['kategori_verifikasi_id'=> '5', 'nama' => 'Luas Tanah'],
            ['kategori_verifikasi_id'=> '6', 'nama' => 'Sumber/Akses Air Minum'],
            ['kategori_verifikasi_id'=> '6', 'nama' => 'Sumber Listrik'],
            ['kategori_verifikasi_id'=> '6', 'nama' => 'Jalan'],
        ];
        foreach ($subKategoriVerifikasis as $subKategoriVerifikasi) {
            DB::table('sub_kategori_verifikasis')->insert($subKategoriVerifikasi);
        }
    }
}
