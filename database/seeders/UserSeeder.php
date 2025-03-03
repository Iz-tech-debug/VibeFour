<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder user
        $user = [
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'email' => '6hjyJ@example.com',
                'password' => bcrypt('admin'),
                'role_id' => 1,
            ]
        ];

        foreach ($user as $value) {
            User::create([
                'nama' => $value['nama'],
                'username' => $value['username'],
                'email' => $value['email'],
                'password' => $value['password'],
                'role_id' => $value['role_id'],
            ]);
        }
    }
}
