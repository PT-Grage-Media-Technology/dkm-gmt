<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lomin;
use Illuminate\Support\Facades\Hash;

class LominSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Lomin::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            // 'nama_lengkap' => 'Admin User',
            // 'no_telepon' => '1234567890',
            // 'profile_admin' => 'admin.jpg',
        ]);
    }
}
