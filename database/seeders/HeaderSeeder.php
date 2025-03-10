<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Header seeder

        $header = [
            [
                'nama' => 'Beranda',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Tentang',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Kontak',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Produk',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Produk Voting',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Produk Penjadwalan',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Teks Masuk',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
        ];

        foreach ($header as $value) {
            Header::create([
                'nama' => $value['nama'],
                'isi' => $value['isi'],
                'bahasa_id' => $value['bahasa_id'],
            ]);
        }
    }
}
