<?php

namespace Database\Seeders;

use App\Models\produkhewan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukHewan1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // produkhewan::create([
        //     'name' => 'Sapi Brahman',
        //         'price' => '80000000',
        //         'image' => 'images/sapiBrahman.jpeg',
        //         'berat' => '1 ton',
        // ]);

        $produkhewan1 = [
            [
                'name' => 'Sapi Brahman',
                'price' => '80000000',
                'image' => 'image/sapiBrahman.jpeg',
                'berat' => '1 ton',
            ],
            [
                'name' => 'Sapi Limosin',
                'price' => '90000000',
                'image' => 'image/sapiLimosin.jpeg',
                'berat' => '1.5 ton',
            ],
            [
                'name' => 'Sapi Madura',
                'price' => '95000000',
                'image' => 'image/sapiMadura.jpeg',
                'berat' => '2 ton',
            ],
            [
                'name' => 'Sapi Ongole',
                'price' => '85000000',
                'image' => 'image/sapiOngole.jpeg',
                'berat' => '1.5 ton',
            ],
            [
                'name' => 'Kambing Beetal',
                'price' => '21000000',
                'image' => 'image/kambingBeetal.jpeg',
                'berat' => '10 kg',
            ],
            [
                'name' => 'Kambing Boer',
                'price' => '20000000',
                'image' => 'image/boerKambing.jpeg',
                'berat' => '8 kg',
            ],
            [
                'name' => 'Kambing Etawa ',
                'price' => '19000000',
                'image' => 'image/kambingEtawa.jpeg',
                'berat' => '7.8 kg',
            ],
            [
                'name' => 'Kambing Saanen ',
                'price' => '22000000',
                'image' => 'image/saanenKambing.jpeg',
                'berat' => '11 kg',
            ],
        ];

        DB::table('produkhewan1')->insert($produkhewan1);
    }
}
