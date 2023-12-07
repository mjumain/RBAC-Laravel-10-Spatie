<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Muhammad Jumain',
            'email' => 'mjumain11@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Pengguna',
            'email' => 'user@gmail.com',
        ]);
        
    }
}
