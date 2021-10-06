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
                'id' => 1,
                'name' => 'Легковой',
                'namecode' => 'legkovoy',
            ],
            [
                'id' => 2,
                'name' => 'Мото',
                'namecode' => 'moto',
            ],
        ]);
    }
}