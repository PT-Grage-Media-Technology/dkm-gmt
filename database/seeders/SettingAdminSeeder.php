<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SettingAdmin;

class SettingAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            SettingAdmin::create([
                'nama' => 'Admin',
                'alamat' => 'Alamat Admin',
                'logo' => 'default_logo.png' // sesuaikan dengan kolom yang ada di tabel
            ]);
    }
}
