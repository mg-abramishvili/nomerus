<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KomplektTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('komplekt_type')->insert([
            [
                'id' => 1,
                'type_id' => 1,
                'komplekt_id' => 1,
            ],
            [
                'id' => 2,
                'type_id' => 1,
                'komplekt_id' => 3,
            ],
            [
                'id' => 3,
                'type_id' => 2,
                'komplekt_id' => 2,
            ],
            [
                'id' => 4,
                'type_id' => 2,
                'komplekt_id' => 4,
            ],
            [
                'id' => 5,
                'type_id' => 3,
                'komplekt_id' => 3,
            ],
            [
                'id' => 6,
                'type_id' => 3,
                'komplekt_id' => 1,
            ],
            [
                'id' => 7,
                'type_id' => 4,
                'komplekt_id' => 4,
            ],
            [
                'id' => 8,
                'type_id' => 4,
                'komplekt_id' => 2,
            ],
        ]);
    }
}