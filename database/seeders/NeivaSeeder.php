<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Neiva\SlugsSeeder;
use Database\Seeders\Neiva\AmbientSeeder;
use Database\Seeders\Neiva\BusStopsSeeder;
use Database\Seeders\Neiva\CRUDActionsSeeder;
use Database\Seeders\Neiva\DigitalZonesSeeder;
use Database\Seeders\Neiva\EducationalCentersSeeder;
use Database\Seeders\Neiva\FiberCamerasLinesSeeder;
use Database\Seeders\Neiva\FiberCamerasPointsSeeder;
use Database\Seeders\Neiva\FiberSiesLinesSeeder;
use Database\Seeders\Neiva\FiberSiesPointsSeeder;
use Database\Seeders\Neiva\FieldsSeeder;
use Database\Seeders\Neiva\FormAlarmsSeeder;
use Database\Seeders\Neiva\FormAmbientSeeder;
use Database\Seeders\Neiva\HeadquartersLasCeibasEPNSeeder;
use Database\Seeders\Neiva\HealthCentersSeeder;
use Database\Seeders\Neiva\IndicatorSeeder;
use Database\Seeders\Neiva\LightingSeeder;
use Database\Seeders\Neiva\MarkersSeeder;
use Database\Seeders\Neiva\MarkerTypeSeeder;
use Database\Seeders\Neiva\MenuBarSeeder;
use Database\Seeders\Neiva\MenuSeeder;
use Database\Seeders\Neiva\ModulesSeeder;  
use Database\Seeders\Neiva\PublicSafetySeeder;
use Database\Seeders\Neiva\SelectTypeSeeder;
use Database\Seeders\Neiva\SportsVenuesSeeder;
use Database\Seeders\Neiva\SubMenuSeeder;
use Database\Seeders\Neiva\TrafficLightSeeder;

class NeivaSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ///system
            SelectTypeSeeder::class,
            FieldsSeeder::class,
            SlugsSeeder::class,
            ModulesSeeder::class,
            FormAlarmsSeeder::class,
            FormAmbientSeeder::class,
            IndicatorSeeder::class,
            MarkerTypeSeeder::class,
            MarkersSeeder::class,
            MenuBarSeeder::class,
            MenuSeeder::class,
            SubMenuSeeder::class,
            //CRUDActionsSeeder::class,

            //data
            AmbientSeeder::class,
            BusStopsSeeder::class,
            DigitalZonesSeeder::class,
            EducationalCentersSeeder::class,
            FiberCamerasLinesSeeder::class,
            FiberCamerasPointsSeeder::class,
            FiberSiesLinesSeeder::class,
            FiberSiesPointsSeeder::class,
            HeadquartersLasCeibasEPNSeeder::class,
            HealthCentersSeeder::class,
            LightingSeeder::class,
            PublicSafetySeeder::class,
            SportsVenuesSeeder::class,
            TrafficLightSeeder::class,

        ]);
    }
}
