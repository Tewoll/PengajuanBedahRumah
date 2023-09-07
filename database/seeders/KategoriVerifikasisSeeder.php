<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriVerifikasisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kategoriVerifikasis = [
            ['nama' => 'KONDISI FISIK RUMAH'],
            ['nama' => 'ASPEK KESELAMATAN'],
            ['nama' => 'ASPEK KOMPONEN BAHAN BANGUNAN'],
            ['nama' => 'ASPEK KESEHATAN'],
            ['nama' => 'ASPEK KECUKUPAN RUANG'],
            ['nama' => 'KETERSEDIAAN PSU'],
        ];
        foreach ($kategoriVerifikasis as $kategoriVerifikasi) {
            DB::table('kategori_verifikasis')->insert($kategoriVerifikasi);
        }
    }
}
