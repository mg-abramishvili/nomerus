<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CertificateSeeder extends Seeder
{
    public function run()
    {
        DB::table('certificates')->insert([
            [
                'id' => 1,
                'name' => 'Сертификат №1',
                'image' => '/img/cert/0001.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Сертификат №2',
                'image' => '/img/cert/0002.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Сертификат №3',
                'image' => '/img/cert/0003.jpg',
            ],
            [
                'id' => 4,
                'name' => 'Сертификат №4',
                'image' => '/img/cert/0004.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Сертификат №5',
                'image' => '/img/cert/0005.jpg',
            ],
            [
                'id' => 6,
                'name' => 'Сертификат №6',
                'image' => '/img/cert/0006.jpg',
            ],
        ]);
    }
}