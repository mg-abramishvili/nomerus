<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AddressSeeder extends Seeder
{
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'id' => 1,
                'name' => 'Лесотехникума, 15',
                'tel' => '+7 927 236-66-29',
                'coordinates' => '54.76016806991445,56.02415149999997',
            ],
            [
                'id' => 2,
                'name' => 'Лесотехникума, 49',
                'tel' => '+7 960 800-32-10',
                'coordinates' => '54.75102956992043,56.030493500000006',
            ],
            [
                'id' => 3,
                'name' => 'Проспект Октября, 141к1',
                'tel' => '+7 903 310-01-10',
                'coordinates' => '54.79820306989438,56.03907249999996',
            ],
            [
                'id' => 4,
                'name' => 'М. Губайдуллина, 6',
                'tel' => '+7 996 579-27-97',
                'coordinates' => '54.7209065699608,56.00081300000001',
            ],
            [
                'id' => 5,
                'name' => 'Московская, 42',
                'tel' => '+7 967 639-55-54',
                'coordinates' => '56.82765556786327,60.58429599999999',
            ],
            [
                'id' => 6,
                'name' => 'Западная, 4а',
                'tel' => '+7 903 311-03-93',
                'coordinates' => '53.6438825708783,55.91007449999996',
            ],
        ]);
    }
}