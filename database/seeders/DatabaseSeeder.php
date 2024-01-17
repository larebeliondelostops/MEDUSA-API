<?php

namespace Database\Seeders;

use App\Models\Tenancy;
use Database\Seeders\Viper\DepartmentSeeder;
use Database\Seeders\Viper\MunicipalitySeeder;
use Database\Seeders\Viper\StateSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AlarmsTableSeeder::class);
        $this->call(CaiTableSeeder::class);
        $this->call(CamerasTableSeeder::class);
        $this->call(PollingPlaceTableSeeder::class);
        $this->call(HealthTableSeeder::class);
        $this->call(IndicatorSeeder::class);
        $this->call(TenancySeeder::class);
        $this->call(MarkerTypeSeeder::class);
        $this->call(MarkersSeeder::class);
        $this->call(MenuBarSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(SubMenuSeeder::class);
        $this->call(SelectTypeSeeder::class);
        $this->call(ModulesSeeder::class);
        $this->call(FieldsSeeder::class);
        $this->call(FormUsersSeeder::class);
        $this->call(FormAlarmsSeeder::class);
        $this->call(FormPollingPlacesSeeder::class);
        $this->call(AmbientSeeder::class);
        $this->call(FormAmbientSeeder::class);
        $this->call(FiberLinesTableSeeder::class);
        $this->call(FiberPointsTableSeeder::class);
        $this->call(SlugsSeeder::class);
        //viper
        $this->call(DepartmentSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(StateSeeder::class);

        //Exclusivo Neiva
        $this->call(FiberSiesLinesSeeder::class);
        $this->call(FiberSiesPointsSeeder::class);
        $this->call(FiberCamerasPointsSeeder::class);
        $this->call(FiberCamerasLinesSeeder::class);
        $this->call(BusStopsSeeder::class);
        $this->call(DigitalZonesSeeder::class);
        $this->call(EducationalCentersSeeder::class);
        $this->call(HealthCentersSeeder::class);
        $this->call(HeadquartersLasCeibasEPNSeeder::class);
        $this->call(LightingSeeder::class);
        $this->call(PublicSafetySeeder::class);
        $this->call(SportsVenuesSeeder::class);
        $this->call(TrafficLightSeeder::class);
    }
}
