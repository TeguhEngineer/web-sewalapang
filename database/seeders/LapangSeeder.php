<?php

namespace Database\Seeders;

use App\Models\Lapang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LapangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Lapang::create([
            'gambar'     => 'futsal.png',
            'jenis_sewa' => 'Futsal',
            'keterangan' => 'Harga Normal Perhari Rp700.000'
        ]);
        Lapang::create([
            'gambar'     => 'basket.png',
            'jenis_sewa' => 'Basket',
            'keterangan' => 'Harga Normal Perhari Rp700.000'
        ]);
        Lapang::create([
            'gambar'     => 'badminton.png',
            'jenis_sewa' => 'Badminton',
            'keterangan' => 'Harga Normal Perhari Rp700.000'
        ]);
        Lapang::create([
            'gambar'     => 'takrow.png',
            'jenis_sewa' => 'Takrow',
            'keterangan' => 'Harga Normal Perhari Rp700.000'
        ]);
        Lapang::create([
            'gambar'     => 'volly.png',
            'jenis_sewa' => 'Volly',
            'keterangan' => 'Harga Normal Perhari Rp700.000'
        ]);
        Lapang::create([
            'gambar'     => 'tenis_meja.png',
            'jenis_sewa' => 'Tenis Meja',
            'keterangan' => 'Harga Normal Perhari Rp700.000'
        ]);
        Lapang::create([
            'gambar'     => 'tenis_lapangan.png',
            'jenis_sewa' => 'Tenis Lapangan',
            'keterangan' => 'Harga Normal Perhari Rp700.000'
        ]);
    }
}
