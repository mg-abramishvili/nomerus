<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddressCitySeeder extends Seeder
{
    public function run()
    {
        DB::table('address_city')->insert([
            [
                'id' => 1,
                'city_id' => 1,
                'address_id' => 1,
            ],
            [
                'id' => 2,
                'city_id' => 1,
                'address_id' => 2,
            ],
            [
                'id' => 3,
                'city_id' => 1,
                'address_id' => 3,
            ],
            [
                'id' => 4,
                'city_id' => 1,
                'address_id' => 4,
            ],
            [
                'id' => 5,
                'city_id' => 2,
                'address_id' => 5,
            ],
            [
                'id' => 6,
                'city_id' => 3,
                'address_id' => 6,
            ],
        ]);
    }
}