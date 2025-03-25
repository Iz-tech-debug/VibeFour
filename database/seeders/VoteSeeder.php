<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $vote = [
            [
                'bahasa_id' => 1,
                'nama' => 'Judul',
                'isi' => 'Voting',
            ],
            [
                'bahasa_id' => 1,
                'nama' => 'Deskripsi',
                'isi' => 'k',
            ],
            [
                'bahasa_id' => 1,
                'nama' => 'Teks Button Coba',
                'isi' => 'Voting',
            ],
            [
                'bahasa_id' => 1,
                'nama' => 'Teks Button Tutorial',
                'isi' => 'd',
            ],
            [
                'bahasa_id' => 1,
                'nama' => 'Link',
                'isi' => 'k',
            ],
            [
                'bahasa_id' => 1,
                'nama' => 'Judul Bagian Keunggulan',
                'isi' => 'm',
            ],
            [
                'bahasa_id' => 1,
                'nama' => 'Keterangan Bagian Keunggulan',
                'isi' => 'coba',
            ],
        ];

        foreach ($vote as $v) {
            Vote::create([
                'nama' => $v['nama'],
                'isi' => $v['isi'],
                'bahasa_id' => $v['bahasa_id'],
            ]);
        }
    }
}
