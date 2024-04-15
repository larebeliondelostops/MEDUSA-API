<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Ditra\MenuSeeder;
use Database\Seeders\Ditra\SlugsSeeder;
use Database\Seeders\Ditra\SubMenuSeeder;
use Database\Seeders\Ditra\MarkersSeeder;
use Database\Seeders\Ditra\MenuBarSeeder;
use Database\Seeders\Ditra\IndicatorSeeder;
use Database\Seeders\Ditra\MarkerTypeSeeder;
use Database\Seeders\Ditra\CamerasTableSeeder;
use Database\Seeders\Ditra\DataDitraTableSeeder;
use Database\Seeders\Ditra\PermissionsTableSeeder;

class DitraSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            //system
            SlugsSeeder::class,
            IndicatorSeeder::class,
            MenuSeeder::class,
            SubMenuSeeder::class,
            MarkerTypeSeeder::class,
            MarkersSeeder::class,
            MenuBarSeeder::class,
            PermissionsTableSeeder::class,
            
            //data
            CamerasTableSeeder::class,
            DataDitraTableSeeder::class,

        ]);
    }
}
