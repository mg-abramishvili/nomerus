<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServiceTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('service_type')->insert([
            [
                'id' => 1,
                'service_id' => 1,
                'type_id' => 1,
            ],
            [
                'id' => 2,
                'service_id' => 2,
                'type_id' => 2,
            ],
            [
                'id' => 3,
                'service_id' => 3,
                'type_id' => 3,
            ],
            [
                'id' => 4,
                'service_id' => 4,
                'type_id' => 5,
            ],
            [
                'id' => 5,
                'service_id' => 5,
                'type_id' => 7,
            ],
        ]);
    }
}