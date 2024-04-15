<?php

namespace Database\Seeders;

use Database\Seeders\Villavicencio\CamerasTableSeeder;
use Database\Seeders\Villavicencio\CaiTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Villavicencio\MenuSeeder;
use Database\Seeders\Villavicencio\SlugsSeeder;
use Database\Seeders\Villavicencio\FieldsTableSeeder;
use Database\Seeders\Villavicencio\MarkersSeeder;
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
use Database\Seeders\Villavicencio\PollingPlaceTableSeeder;
use Database\Seeders\Villavicencio\TrafficLightsTableSeeder;
use Database\Seeders\Villavicencio\BooleanSelectTableSeeder;
use Database\Seeders\Villavicencio\BarMenuTableSeeder;
use Database\Seeders\Villavicencio\FormsTableSeeder;
use Database\Seeders\Villavicencio\IncidentTableSeeder;
use Database\Seeders\Villavicencio\ModelHasPermissionsTableSeeder;
use Database\Seeders\Villavicencio\ModelHasRolesTableSeeder;
use Database\Seeders\Villavicencio\RoleHasPermissionsTableSeeder;
use Database\Seeders\Villavicencio\RolesTableSeeder;
use Database\Seeders\Villavicencio\SettingsTableSeeder;
use Database\Seeders\Villavicencio\UsersTableSeeder;

class VillavicencioSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            //system
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            SelectTypeSeeder::class,
            SlugsSeeder::class,
            ModulesSeeder::class,
            //FormAlarmsSeeder::class,
            //FormPollingPlacesSeeder::class,
            //FormUsersSeeder::class,
            IndicatorSeeder::class,
            MarkerTypeSeeder::class,
            MarkersSeeder::class,
            BarMenuTableSeeder::class,
            MenuSeeder::class,   
            SubMenuSeeder::class,
            BooleanSelectTableSeeder::class,
            FieldsTableSeeder::class,
            FormsTableSeeder::class,
            //ModelHasPermissionsTableSeeder::class,
            //ModelHasRolesTableSeeder::class,
            //RoleHasPermissionsTableSeeder::class,
            SettingsTableSeeder::class,
            
             //CRUDActionsSeeder::class,

            //Data
            IncidentTableSeeder::class,
            AlarmsTableSeeder::class,
            FiberLinesTableSeeder::class,
            FiberPointsTableSeeder::class,
            HealthTableSeeder::class,
            PollingPlaceTableSeeder::class,
            TrafficLightsTableSeeder::class,
            CamerasTableSeeder::class,
            CaiTableSeeder::class,
        ]);
    }
}
