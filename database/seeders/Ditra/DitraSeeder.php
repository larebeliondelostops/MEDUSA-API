<?php

namespace Database\Seeders\Ditra;

use Database\Seeders\Ditra\DataDitraTableSeeder;
use Database\Seeders\Ditra\IndicatorSeeder;
use Illuminate\Database\Seeder;

class DitraSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            IndicatorSeeder::class,
            DataDitraTableSeeder::class,
        ]);
    }
}
