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
                'name' => 'Автомобиль',
                'namecode' => 'legkovoy',
            ],
            [
                'id' => 2,
                'name' => 'Мотоцикл',
                'namecode' => 'moto',
            ],
            [
                'id' => 3,
                'name' => 'Прицеп',
                'namecode' => 'pricep',
            ],
        ]);
    }
}