<?php

namespace Database\Seeders\Viper;

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

        ]);
    }
}
