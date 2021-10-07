<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CityTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('city_type')->insert([
            [
                'id' => 1,
                'city_id' => 1,
                'type_id' => 1,
                'price' => 800,
                'komplekt_same_type_price' => 750,
                'komplekt_price' => 800
            ],
            [
                'id' => 2,
                'city_id' => 2,
                'type_id' => 1,
                'price' => 800,
                'komplekt_same_type_price' => 750,
                'komplekt_price' => 800
            ],
            [
                'id' => 3,
                'city_id' => 1,
                'type_id' => 2,
                'price' => 1000,
                'komplekt_same_type_price' => 1000,
                'komplekt_price' => 1000
            ],
            [
                'id' => 4,
                'city_id' => 1,
                'type_id' => 3,
                'price' => 1500,
                'komplekt_same_type_price' => 1500,
                'komplekt_price' => 1500
            ],
            [
                'id' => 5,
                'city_id' => 1,
                'type_id' => 4,
                'price' => 1500,
                'komplekt_same_type_price' => 1500,
                'komplekt_price' => 1500
            ],
        ]);
    }
}