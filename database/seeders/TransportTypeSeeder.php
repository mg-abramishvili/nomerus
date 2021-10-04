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
        ]);
    }
}