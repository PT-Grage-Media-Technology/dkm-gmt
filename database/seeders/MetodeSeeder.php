<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('metode')->insert([
            ['jenis' => 'Bayar di Tempat', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Transfer', 'created_at' => now(), 'updated_at' => now()],
            ['jenis' => 'Aplikasi Pay', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
