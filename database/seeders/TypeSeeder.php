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
                'flag' => 1,
                'price' => 800,
                'komplekt_price' => 750
            ],
            [
                'id' => 2,
                'name' => 'Тип 1 (без флага)',
                'namecode' => 'type1_without_flag',
                'flag' => 0,
                'price' => 1000,
                'komplekt_price' => 1000
            ],
        ]);
    }
}