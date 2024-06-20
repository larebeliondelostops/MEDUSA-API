<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;

class ViperSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            MeasurementUnitSeeder::class,
            MunicipalitySeeder::class,
            SectorSeeder::class,
            StageSeeder::class,
            StateSeeder::class,
            SubstateSeeder::class,
            
            SlugSeeder::class,
            MarkerTypeSeeder::class,
            MarkersSeeder::class,
            MenuBarSeeder::class,
            MenuSeeder::class,
            PhaseSeeder::class,
            ProjectSheetSeeder::class,
        ]);
    }
}
