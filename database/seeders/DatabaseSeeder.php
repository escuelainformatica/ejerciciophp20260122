<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ciudad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User2',
            'email' => 'test@example.com',
            'password' => Hash::make('abc123')
        ]);
        Ciudad::factory(100)->create();


        User::factory()->create([
            'name' => 'Test User2',
            'email' => 'a@example.com',
            'password' => Hash::make('abc123')
        ]);


    }
}
