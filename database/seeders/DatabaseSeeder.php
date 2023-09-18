<?php

namespace Database\Seeders;

use App\Models\Tenancy;
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
        $this->call(EntitiesTableSeeder::class);
        $this->call(HealthTableSeeder::class);
        $this->call(IndicatorSeeder::class);
        $this->call(TenancySeeder::class);
        $this->call(MarkerTypeSeeder::class);
        $this->call(MarkersSeeder::class);
        $this->call(MenuBarSeeder::class);
        $this->call(SubMenuBarSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(SelectTypeSeeder::class);
        $this->call(ModulesSeeder::class);
        $this->call(FieldsSeeder::class);
        $this->call(FormUsersSeeder::class);
        $this->call(FormAlarmsSeeder::class);
        $this->call(FormPollingPlacesSeeder::class);
        $this->call(AmbientSeeder::class);
    }
}
