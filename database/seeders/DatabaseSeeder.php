<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TypeSeeder::class,
            TransportSeeder::class,
            CitySeeder::class,
            TransportTypeSeeder::class,
            KomplektTypeSeeder::class,
            CityTypeSeeder::class,
            CertificateSeeder::class,
        ]);
    }
}