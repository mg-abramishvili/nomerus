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
                'name' => 'Обычный номер',
                'namecode' => 'type1_with_flag',
                'bold' => 1
            ],
            [
                'id' => 2,
                'name' => 'Номер без флага',
                'namecode' => 'type1_without_flag',
                'bold' => 1
            ],
            [
                'id' => 3,
                'name' => 'Квадратный номер',
                'namecode' => 'type1a',
                'bold' => 0
            ],
            [
                'id' => 4,
                'name' => 'Квадратный (без флага)',
                'namecode' => 'type1a_without_flag',
                'bold' => 0
            ],
            [
                'id' => 5,
                'name' => 'Обычный номер',
                'namecode' => 'type4mini',
                'bold' => 0
            ],
            [
                'id' => 6,
                'name' => 'Номер без флага',
                'namecode' => 'type4mini_without_flag',
                'bold' => 0
            ],
            [
                'id' => 7,
                'name' => 'Обычный номер',
                'namecode' => 'type2_with_flag',
                'bold' => 1
            ],
            [
                'id' => 8,
                'name' => 'Номер без флага',
                'namecode' => 'type2_without_flag',
                'bold' => 1
            ],
        ]);
    }
}