<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\produkhewan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //memasukkan 10 data palsu di db
            // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'username' => 'dkm',
            'email' => 'dkm@gmail.com',
            'password' => Hash::make('password')
        ]);

        
    }
}
