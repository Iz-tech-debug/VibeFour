<?php

namespace Database\Seeders;

use App\Models\TNC;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TNCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeding
        $tnc = [
            [
                'nama' => 'Judul',
                'isi' => 'Selamat datang',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Keterangan',
                'isi' => 'Halo selamat datang di bagian Syarat dan Ketentuan penggunaan produk kami',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Isi',
                'isi' => 'Syarat dan Ketentuan penggunaan produk kami',
                'bahasa_id' => 1,
            ],
        ];

        TNC::insert($tnc);
    }
}
