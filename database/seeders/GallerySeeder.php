<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run()
    {
        DB::table('galleries')->insert([
            [
                'id' => 1,
                'image' => '/img/gal/gal1.jpg',
            ],
            [
                'id' => 2,
                'image' => '/img/gal/gal2.jpg',
            ],
            [
                'id' => 3,
                'image' => '/img/gal/gal3.jpg',
            ],
            [
                'id' => 4,
                'image' => '/img/gal/gal4.jpg',
            ],
            [
                'id' => 5,
                'image' => '/img/gal/gal5.jpg',
            ],
        ]);
    }
}