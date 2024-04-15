<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Marcadores para villavicencio
         */
        DB::table('modules')->insert([
            [
                'id' => 1,
                'name' => 'Usuarios',
                'slug' => 10,
                'description' => 'Módulo para la gestión de usuarios',
                'namespace' => 'App\Strategies\StrategiesCruds\Villavicencio\StrategyAlarms',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Eventos',
                'slug' => 55,
                'description' => 'Módulo para la gestión de eventos',
                'namespace' => 'App\Strategies\StrategiesCruds\Villavicencio\StrategyEvents',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Salud',
                'slug' => 3,
                'description' => 'Módulo para la gestión de salud',
                'namespace' => 'App\Strategies\StrategiesCruds\Villavicencio\StrategyHealth',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Cais',
                'slug' => 2,
                'description' => 'Módulo para la gestión de cais',
                'namespace' => 'App\Strategies\StrategiesCruds\Villavicencio\StrategyCais',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Cámaras',
                'slug' => 50,
                'description' => 'Módulo para la gestión de cámaras',
                'namespace' => 'App\Strategies\StrategiesCruds\Villavicencio\StrategyCameras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Alarmas',
                'slug' => 1,
                'description' => 'Módulo para la gestión de las alarmas',
                'namespace' => 'App\Strategies\StrategiesCruds\Villavicencio\StrategyAlarms',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Mesas de votación',
                'slug' => 4,
                'description' => 'Módulo para la gestión de las mesas de votación (lugares)',
                'namespace' => 'App\Strategies\StrategiesCruds\Villavicencio\StrategyVotingTables',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
