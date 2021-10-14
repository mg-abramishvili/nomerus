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
                'max_price' => 1000,
            ],
            [
                'id' => 2,
                'city_id' => 1,
                'type_id' => 2,
                'price' => 1000,
                'min_price' => 1000,
                'max_price' => 1000,
            ],
            [
                'id' => 3,
                'city_id' => 1,
                'type_id' => 3,
                'price' => 1500,
                'min_price' => 1500,
                'max_price' => 1500,
            ],
            [
                'id' => 4,
                'city_id' => 1,
                'type_id' => 4,
                'price' => 2000,
                'min_price' => 2000,
                'max_price' => 2000,
            ],
            [
                'id' => 5,
                'city_id' => 1,
                'type_id' => 5,
                'price' => 1500,
                'min_price' => 1500,
                'max_price' => 1500,
            ],
            [
                'id' => 6,
                'city_id' => 1,
                'type_id' => 6,
                'price' => 2000,
                'min_price' => 2000,
                'max_price' => 2000,
            ],
            [
                'id' => 7,
                'city_id' => 1,
                'type_id' => 7,
                'price' => 800,
                'min_price' => 800,
                'max_price' => 1000,
            ],
            [
                'id' => 8,
                'city_id' => 1,
                'type_id' => 8,
                'price' => 1000,
                'min_price' => 1000,
                'max_price' => 1000,
            ],
            [
                'id' => 9,
                'city_id' => 2,
                'type_id' => 1,
                'price' => 1000,
                'min_price' => 900,
                'max_price' => 1500,
            ],
            [
                'id' => 10,
                'city_id' => 2,
                'type_id' => 2,
                'price' => 1500,
                'min_price' => 1500,
                'max_price' => 1500,
            ],
            [
                'id' => 11,
                'city_id' => 2,
                'type_id' => 3,
                'price' => 1500,
                'min_price' => 1500,
                'max_price' => 1500,
            ],
            [
                'id' => 12,
                'city_id' => 2,
                'type_id' => 4,
                'price' => 2000,
                'min_price' => 2000,
                'max_price' => 2000,
            ],
            [
                'id' => 13,
                'city_id' => 2,
                'type_id' => 5,
                'price' => 1500,
                'min_price' => 1500,
                'max_price' => 1500,
            ],
            [
                'id' => 14,
                'city_id' => 2,
                'type_id' => 6,
                'price' => 2000,
                'min_price' => 2000,
                'max_price' => 2000,
            ],
            [
                'id' => 15,
                'city_id' => 2,
                'type_id' => 7,
                'price' => 1000,
                'min_price' => 1000,
                'max_price' => 1500,
            ],
            [
                'id' => 16,
                'city_id' => 2,
                'type_id' => 8,
                'price' => 1500,
                'min_price' => 1500,
                'max_price' => 1500,
            ],
        ]);
    }
}
