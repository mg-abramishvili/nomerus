<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PartnerSeeder extends Seeder
{
    public function run()
    {
        DB::table('partners')->insert([
            [
                'id' => 1,
                'name' => 'Башкирэнерго',
                'image' => '/img/partners/bashkirenergo.svg',
            ],
            [
                'id' => 2,
                'name' => 'Мои Документы РБ',
                'image' => '/img/partners/moi_dokumenty.svg',
            ],
            [
                'id' => 3,
                'name' => 'РН-Транспорт',
                'image' => '/img/partners/rn-transport.svg',
            ],
            [
                'id' => 4,
                'name' => 'Европлан',
                'image' => '/img/partners/evroplan.svg',
            ],
            [
                'id' => 5,
                'name' => 'Башкиравтодвор',
                'image' => '/img/partners/bashkiravtodvor.png',
            ],
            [
                'id' => 6,
                'name' => 'БашМинералРесурс',
                'image' => '/img/partners/bashmineral.png',
            ],
            [
                'id' => 7,
                'name' => 'Буринтех',
                'image' => '/img/partners/burintekh.png',
            ],
            [
                'id' => 8,
                'name' => 'Аварийно-спасательная служба РБ',
                'image' => '/img/partners/avar.png',
            ],
            [
                'id' => 9,
                'name' => 'Росгвардия',
                'image' => '/img/partners/rosgvard.svg',
            ],
        ]);
    }
}