<?php

namespace Database\Seeders\villavicencio;

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
        //$this->call(TenancySeeder::class); -- creo que ya no es necesario por lo nuevo de tenants
        $this->call(MarkerTypeSeeder::class); // tenant
        $this->call(MarkersSeeder::class); // tenant
        $this->call(MenuBarSeeder::class); // tenant
        $this->call(MenuSeeder::class); // tenant
        $this->call(SubMenuSeeder::class); // tenant
        $this->call(SelectTypeSeeder::class); // tenant
        $this->call(ModulesSeeder::class); // tenant
        $this->call(FieldsSeeder::class); // tenant
        $this->call(FormUsersSeeder::class);
        $this->call(FormAlarmsSeeder::class);
        $this->call(FormPollingPlacesSeeder::class);
        $this->call(AmbientSeeder::class); // creo que no es necesario, no tiene data de villavicencio
        $this->call(FormAmbientSeeder::class); // creo que no es necesario, no tiene data de villavicencio
        $this->call(FiberLinesTableSeeder::class);
        $this->call(FiberPointsTableSeeder::class);
        $this->call(SlugsSeeder::class);
    }
}
