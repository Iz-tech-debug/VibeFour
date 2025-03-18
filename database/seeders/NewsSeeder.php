<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Berita
        $berita = [
            [
                'judul' => 'VibeFour orang asik',
                'konten' => 'ABC ya',
                'gambar' => '',
            ],
            [
                'judul' => 'VibeFour tempatnya orang keren',
                'konten' => 'Halo selamat datang di bagian Berita',
                'gambar' => 'img/news/2.jpg',
            ],
            [
                'judul' => 'VibeFour punya mugi',
                'konten' => 'Halo guys',
                'gambar' => 'img/news/3.jpg',
            ],
        ];
        foreach ($berita as $item) {
            News::create([
                'judul' => $item['judul'],
                'konten' => $item['konten'],
                'gambar' => $item['gambar'],
            ]);
        }
    }
}
