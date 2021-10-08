<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TransportTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('transport_type')->insert([
            [
                'id' => 1,
                'transport_id' => 1,
                'type_id' => 1,
            ],
            [
                'id' => 2,
                'transport_id' => 1,
                'type_id' => 2,
            ],
            [
                'id' => 3,
                'transport_id' => 1,
                'type_id' => 3,
            ],
            [
                'id' => 4,
                'transport_id' => 1,
                'type_id' => 4,
            ],
            [
                'id' => 5,
                'transport_id' => 2,
                'type_id' => 5,
            ],
            [
                'id' => 6,
                'transport_id' => 2,
                'type_id' => 6,
            ],
            [
                'id' => 7,
                'transport_id' => 2,
                'type_id' => 7,
            ],
            [
                'id' => 8,
                'transport_id' => 2,
                'type_id' => 8,
            ],
        ]);
    }
}