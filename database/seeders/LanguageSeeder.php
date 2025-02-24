<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pengisian data ke dalam tabel bahasa
        $bahasa = [
            [
                'kode' => 'idn',
                'nama' => 'Indonesia',
                'gambar' => 'img/bahasa/idn.png',
            ],
            [
                'kode' => 'eng',
                'nama' => 'English',
                'gambar' => 'img/bahasa/eng.png',
            ],
        ];
        foreach ($bahasa as $value) {
            Language::create([
                'kode' => $value['kode'],
                'nama' => $value['nama'],
                'gambar' => $value['gambar'],
            ]);
        }
    }
}
