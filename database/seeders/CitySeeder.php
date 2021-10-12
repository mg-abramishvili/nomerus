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
                'instagram' => 'https://www.instagram.com/nomerus_ufa/',
            ],
            [
                'id' => 2,
                'name' => 'Екатеринбург',
                'namecode' => 'ekb',
                'instagram' => 'https://www.instagram.com/nomerus_ekb/',
            ],
            [
                'id' => 3,
                'name' => 'Стерлитамак',
                'namecode' => 'strltmk',
                'instagram' => NULL,
            ],
        ]);
    }
}