<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSubKategoriVerifikasisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $detailSubKategoriVerifikasis = [
            ['sub_ktgr_verifikasi_id'=> '2', 'nama' => 'Jenis'],
            ['sub_ktgr_verifikasi_id'=> '2', 'nama' => 'Material'],
            ['sub_ktgr_verifikasi_id'=> '2', 'nama' => 'Ukuran'],
            ['sub_ktgr_verifikasi_id'=> '2', 'nama' => 'Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '2', 'nama' => 'Tingkat Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '3', 'nama' => 'Material'],
            ['sub_ktgr_verifikasi_id'=> '3', 'nama' => 'Ukuran'],
            ['sub_ktgr_verifikasi_id'=> '3', 'nama' => 'Ikatan'],
            ['sub_ktgr_verifikasi_id'=> '3', 'nama' => 'Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '3', 'nama' => 'Tingkat Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '4', 'nama' => 'Material'],
            ['sub_ktgr_verifikasi_id'=> '4', 'nama' => 'Ukuran'],
            ['sub_ktgr_verifikasi_id'=> '4', 'nama' => 'Ikatan'],
            ['sub_ktgr_verifikasi_id'=> '4', 'nama' => 'Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '4', 'nama' => 'Tingkat Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '5', 'nama' => 'Material'],
            ['sub_ktgr_verifikasi_id'=> '5', 'nama' => 'Ukuran'],
            ['sub_ktgr_verifikasi_id'=> '5', 'nama' => 'Ikatan'],
            ['sub_ktgr_verifikasi_id'=> '5', 'nama' => 'Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '5', 'nama' => 'Tingkat Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '6', 'nama' => 'Material'],
            ['sub_ktgr_verifikasi_id'=> '6', 'nama' => 'Ukuran'],
            ['sub_ktgr_verifikasi_id'=> '6', 'nama' => 'Ikatan'],
            ['sub_ktgr_verifikasi_id'=> '6', 'nama' => 'Tingkat Kerusakan'],
            ['sub_ktgr_verifikasi_id'=> '7', 'nama' => 'Kondisi Penutup Atap'],
            ['sub_ktgr_verifikasi_id'=> '8', 'nama' => 'Kondisi Dinding'],
            ['sub_ktgr_verifikasi_id'=> '9', 'nama' => 'Kondisi Lantai'],
        ];
        foreach ($detailSubKategoriVerifikasis as $detailSubKategoriVerifikasi) {
            DB::table('detail_sub_kategori_verifikasis')->insert($detailSubKategoriVerifikasi);
        }
    }
}
