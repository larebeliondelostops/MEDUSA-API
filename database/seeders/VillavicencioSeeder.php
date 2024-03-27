<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Villavicencio\MenuSeeder;
use Database\Seeders\Villavicencio\SlugsSeeder;
use Database\Seeders\Villavicencio\FieldsSeeder;
use Database\Seeders\Villavicencio\MarkersSeeder;
use Database\Seeders\Villavicencio\MenuBarSeeder;
use Database\Seeders\Villavicencio\ModulesSeeder;
use Database\Seeders\Villavicencio\SubMenuSeeder;
use Database\Seeders\Villavicencio\FormUsersSeeder;
use Database\Seeders\Villavicencio\IndicatorSeeder;
use Database\Seeders\Villavicencio\FormAlarmsSeeder;
use Database\Seeders\Villavicencio\MarkerTypeSeeder;
use Database\Seeders\Villavicencio\SelectTypeSeeder;
use Database\Seeders\Villavicencio\AlarmsTableSeeder;
use Database\Seeders\Villavicencio\CRUDActionsSeeder;
use Database\Seeders\Villavicencio\HealthTableSeeder;
use Database\Seeders\Villavicencio\FiberLinesTableSeeder;
use Database\Seeders\Villavicencio\FiberPointsTableSeeder;
use Database\Seeders\Villavicencio\FormPollingPlacesSeeder;
use Database\Seeders\Villavicencio\IpatsTableSeeder;
use Database\Seeders\Villavicencio\PollingPlaceTableSeeder;
use Database\Seeders\Villavicencio\TrafficLightsTableSeeder;

class VillavicencioSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AlarmsTableSeeder::class,
            //CRUDActionsSeeder::class,
            FiberLinesTableSeeder::class,
            FiberPointsTableSeeder::class,
            SelectTypeSeeder::class,
            FieldsSeeder::class,
            ModulesSeeder::class,
            FormAlarmsSeeder::class,
            FormPollingPlacesSeeder::class,
            FormUsersSeeder::class,
            HealthTableSeeder::class,
            IndicatorSeeder::class,
            MarkerTypeSeeder::class,
            MarkersSeeder::class,
            MenuBarSeeder::class,
            MenuSeeder::class,         
            PollingPlaceTableSeeder::class,
            SlugsSeeder::class,
            SubMenuSeeder::class,
            IpatsTableSeeder::class,
            TrafficLightsTableSeeder::class,
        ]);
    }
}
