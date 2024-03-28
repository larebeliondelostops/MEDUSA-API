<?php

namespace Database\Seeders\Ditra;

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

class NeivaSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SlugsSeeder::class,
            CamerasTableSeeder::class,
            IndicatorSeeder::class,
            DataDitraTableSeeder::class,
            MenuSeeder::class,
            SubMenuSeeder::class,
            MarkerTypeSeeder::class,
            MarkersSeeder::class,
            MenuBarSeeder::class,
            PermissionsTableSeeder::class,
        ]);
    }
}
