<?php

namespace Database\Seeders;

use App\Models\Tenancy;
use Database\Seeders\Viper\DepartmentSeeder;
use Database\Seeders\Viper\MeasurementUnitSeeder;
use Database\Seeders\Viper\MunicipalitySeeder;
use Database\Seeders\Viper\SectorSeeder;
use Database\Seeders\Viper\StageSeeder;
use Database\Seeders\Viper\StateSeeder;
use Database\Seeders\Viper\SubstateSeeder;
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
        #$this->call(AlarmsTableSeeder::class);
        #$this->call(CaiTableSeeder::class);
        #$this->call(CamerasTableSeeder::class);
        #$this->call(PollingPlaceTableSeeder::class);
        #$this->call(HealthTableSeeder::class);
       // $this->call(IndicatorSeeder::class);
        //$this->call(TenancySeeder::class);
        $this->call(MarkerTypeSeeder::class); // tenant
        $this->call(MarkersSeeder::class); // tenant
        $this->call(MenuBarSeeder::class); // tenant
        $this->call(MenuSeeder::class); // tenant
        //$this->call(SubMenuSeeder::class); // tenant
        $this->call(SelectTypeSeeder::class); // tenant
        //$this->call(ModulesSeeder::class); // tenant
        $this->call(FieldsSeeder::class); // tenant
        //$this->call(FormUsersSeeder::class);
        //$this->call(FormAlarmsSeeder::class);
        //$this->call(FormPollingPlacesSeeder::class);
        //$this->call(AmbientSeeder::class);
        //$this->call(FormAmbientSeeder::class);
        //$this->call(FiberLinesTableSeeder::class);
        //$this->call(FiberPointsTableSeeder::class);
        $this->call(SlugsSeeder::class);
        //viper
        $this->call(DepartmentSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(StageSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(SubstateSeeder::class);
        $this->call(MeasurementUnitSeeder::class);
        $this->call(SectorSeeder::class);

        //Exclusivo Neiva
        #$this->call(FiberSiesLinesSeeder::class);
        #$this->call(FiberSiesPointsSeeder::class);
        #$this->call(FiberCamerasPointsSeeder::class);
        #$this->call(FiberCamerasLinesSeeder::class);
        #$this->call(BusStopsSeeder::class);
        #$this->call(DigitalZonesSeeder::class);
        #$this->call(EducationalCentersSeeder::class);
        #$this->call(HealthCentersSeeder::class);
        #$this->call(HeadquartersLasCeibasEPNSeeder::class);
        #$this->call(LightingSeeder::class);
        #$this->call(PublicSafetySeeder::class);
        #$this->call(SportsVenuesSeeder::class);
        #$this->call(TrafficLightSeeder::class);
    }
}
