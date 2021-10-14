<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            [
                'id' => 1,
                'name' => 'Обычный номер',
                'type' => 'legkovoy',
                'text' => 'Номер для легковых, грузовых автомобилей и автобусов.',
                'image' => '/img/home-services-1.jpg',
                'plate' => '/img/type1.png',
            ],
            [
                'id' => 2,
                'name' => 'Номер без флага',
                'type' => 'legkovoy',
                'text' => 'На номере отсутствует триколор (флаг), надпись RUS выдавлена.',
                'image' => '/img/home-services-2.jpg',
                'plate' => '/img/type1_without_flag.png',
            ],
            [
                'id' => 3,
                'name' => 'Квадратный номер',
                'type' => 'legkovoy',
                'text' => 'Номер под нестандартное место крепления, используется на американских и японских авто.',
                'image' => '/img/home-services-3.jpg',
                'plate' => '/img/type1a.png',
            ],
            [
                'id' => 4,
                'name' => 'Номер для мотоцикла',
                'type' => 'moto',
                'text' => 'Номер для мотоциклов, мотороллеров и мопедов, новый ГОСТ (маленький размер).',
                'image' => '/img/home-services-4.jpg',
                'plate' => '/img/type4.png',
            ],
            [
                'id' => 5,
                'name' => 'Номер для прицепа',
                'type' => 'pricep',
                'text' => 'Номер для прицепов и полуприцепов.',
                'image' => '/img/home-services-5.jpg',
                'plate' => '/img/type2.png',
            ],
        ]);
    }
}