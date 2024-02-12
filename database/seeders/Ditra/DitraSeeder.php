<?php

namespace Database\Seeders\Ditra;

use Database\Seeders\Ditra\SlugsSeeder;
use Database\Seeders\Ditra\IndicatorSeeder;
use Database\Seeders\Ditra\CamerasTableSeeder;
use Database\Seeders\Ditra\DataDitraTableSeeder;
use Illuminate\Database\Seeder;

class DitraSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SlugsSeeder::class,
            CamerasTableSeeder::class,
            IndicatorSeeder::class,
            DataDitraTableSeeder::class,
        ]);
    }
}
