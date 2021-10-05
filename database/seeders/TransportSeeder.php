<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TransportSeeder extends Seeder
{
    public function run()
    {
        DB::table('transports')->insert([
            [
                'name' => 'Легковой',
                'namecode' => 'legkovoy',
                'komplekt' => 1,
            ],
            [
                'name' => 'Мото',
                'namecode' => 'moto',
                'komplekt' => 0,
            ],
        ]);
    }
}