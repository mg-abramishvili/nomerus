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
                'min_price' => 750,
            ],
            [
                'id' => 2,
                'city_id' => 2,
                'type_id' => 1,
                'price' => 850,
                'min_price' => 750,
            ],
            [
                'id' => 3,
                'city_id' => 1,
                'type_id' => 2,
                'price' => 1000,
                'min_price' => 1000,
            ],
            [
                'id' => 4,
                'city_id' => 1,
                'type_id' => 3,
                'price' => 1500,
                'min_price' => 1500,
            ],
            [
                'id' => 5,
                'city_id' => 1,
                'type_id' => 4,
                'price' => 1500,
                'min_price' => 1500,
            ],
            [
                'id' => 6,
                'city_id' => 1,
                'type_id' => 5,
                'price' => 1500,
                'min_price' => 1500,
            ],
            [
                'id' => 7,
                'city_id' => 1,
                'type_id' => 6,
                'price' => 1500,
                'min_price' => 1500,
            ],
            [
                'id' => 8,
                'city_id' => 1,
                'type_id' => 7,
                'price' => 1500,
                'min_price' => 1500,
            ],
            [
                'id' => 9,
                'city_id' => 1,
                'type_id' => 8,
                'price' => 1500,
                'min_price' => 1500,
            ],
        ]);
    }
}
