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
                'nama' => 'Indonesia',
                'gambar' => 'img/bahasa/idn.png',
            ],
            [
                'nama' => 'English',
                'gambar' => 'img/bahasa/eng.png',
            ],
        ];
        foreach ($bahasa as $value) {
            Language::create([
                'nama' => $value['nama'],
                'gambar' => $value['gambar'],
            ]);
        }
    }
}
