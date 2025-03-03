<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder kontak
        $kontak = [
            [
                'nama' => 'Judul',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'IFrame',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Subjudul',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Keterangan',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Alamat',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Telepon',
                'isi' => 'ABC',
                'bahasa_id' => 1,
            ],
            [
                'nama' => 'Email',
                'isi' => 'ABC@gmail.com',
                'bahasa_id' => 1,
            ],
        ];

        foreach ($kontak as $value) {
            Contact::create([
                'nama' => $value['nama'],
                'isi' => $value['isi'],
                'bahasa_id' => $value['bahasa_id'],
            ]);
        }
    }
}
