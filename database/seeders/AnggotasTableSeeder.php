<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnggotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggotas')->insert([
            'username' => 'anggota',
            'email' => 'anggota@example.com',
            'password' => Hash::make('anggota'),
        ]);
    }
}
