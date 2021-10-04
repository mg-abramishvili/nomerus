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
                'name' => 'Уфа',
            ],
            [
                'name' => 'Екатеринбург',
            ],
        ]);
    }
}