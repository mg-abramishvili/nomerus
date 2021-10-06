<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('types')->insert([
            [
                'id' => 1,
                'name' => 'Тип 1',
                'namecode' => 'type1_with_flag',
                'bold' => 1,
                'price' => 800,
                'komplekt_same_type_price' => 750,
                'komplekt_price' => 800
            ],
            [
                'id' => 2,
                'name' => 'Тип 1 (без флага)',
                'namecode' => 'type1_without_flag',
                'bold' => 1,
                'price' => 1000,
                'komplekt_same_type_price' => 1000,
                'komplekt_price' => 1000
            ],
            [
                'id' => 3,
                'name' => 'Тип 1А',
                'namecode' => 'type1a',
                'bold' => 0,
                'price' => 1500,
                'komplekt_same_type_price' => 1500,
                'komplekt_price' => 1500
            ],
            [
                'id' => 4,
                'name' => 'Тип 4',
                'namecode' => 'type4',
                'bold' => 0,
                'price' => 1500,
                'komplekt_same_type_price' => 1500,
                'komplekt_price' => 1500
            ],
        ]);
    }
}