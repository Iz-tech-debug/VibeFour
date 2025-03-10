<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeding FAQ
        $faq = [
            [
                'pertanyaan' => 'Bagaimana cara login?',
                'jawaban' => 'Silahkan klik tombol Login di atas',
                'bahasa_id' => 1
            ],
            [
                'pertanyaan' => 'Apakah real',
                'jawaban' => 'Ya',
                'bahasa_id' => 1
            ],
            [
                'pertanyaan' => 'How to login?',
                'jawaban' => 'Firstly click the Login button on the top',
                'bahasa_id' => 2
            ],
        ];

        foreach ($faq as $item) {
            FAQ::create([
                'pertanyaan' => $item['pertanyaan'],
                'jawaban' => $item['jawaban'],
                'bahasa_id' => $item['bahasa_id']
            ]);
        }

    }
}
