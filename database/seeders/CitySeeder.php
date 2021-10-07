<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            [
                'id' => 1,
                'name' => 'Уфа',
                'namecode' => 'ufa',
            ],
            [
                'id' => 2,
                'name' => 'Екатеринбург',
                'namecode' => 'ekb',
            ],
        ]);
    }
}