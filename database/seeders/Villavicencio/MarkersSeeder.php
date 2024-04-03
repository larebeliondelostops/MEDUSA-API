<?php


namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkersSeeder extends Seeder
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
        DB::table('marker')->insert([
            [
                'id' => 1,
                'marker_type' => 1,
                'name' => 'Alarmas',
                'icon' => 'notifications_active',
                'color' => 'yellow',
                'slug' => 1,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyAlarms',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'marker_type' => 1,
                'name' => 'Cais',
                'icon' => 'local_police',
                'color' => 'green',
                'slug' => 2,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyCai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'marker_type' => 1,
                'name' => 'Salud',
                'icon' => 'health_and_safety',
                'color' => 'red',
                'slug' => 3,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyHealth',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'marker_type' => 1,
                'name' => 'Puestos de votación',
                'icon' => 'how_to_vote',
                'color' => 'purple',
                'slug' => 4,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyPollingPlace',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'marker_type' => 1,
                'name' => 'Ipats',
                'icon' => 'local_hospital',
                'color' => 'pink',
                'slug' => 7,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyIpats',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'marker_type' => 1,
                'name' => 'Semaforos',
                'icon' => 'traffic',
                'color' => 'bluegreen',
                'slug' => 8,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyTrafficLights',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 50,
                'marker_type' => 1,
                'name' => 'Camaras',
                'icon' => 'videocam',
                'color' => 'blue',
                'slug' => 50,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyCameras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 54,
                'marker_type' => 1,
                'name' => 'Unidades móviles',
                'icon' => 'radar',
                'color' => 'orange',
                'slug' => 54,
                'namespace' => 'App\Strategies\StrategiesMovementUnits\StrategyMovementUnits',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'marker_type' => 1,
                'name' => 'Fibra Óptica',
                'icon' => 'cable',
                'color' => 'cyan',
                'slug' => 5,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyFiberPoints',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 51,
                'marker_type' => 4,
                'name' => 'Modelo Probabilistico',
                'icon' => 'data_usage',
                'color' => 'cyan',
                'slug' => 51,
                'namespace' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 52,
                'marker_type' => 4,
                'name' => 'Mapa de Calor',
                'icon' => 'local_fire_department',
                'color' => 'lightgreen',
                'slug' => 52,
                'namespace' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 53,
                'marker_type' => 4,
                'name' => 'Tráfico',
                'icon' => 'traffic',
                'color' => 'bluegreen',
                'slug' => 53,
                'namespace' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 55,
                'marker_type' => 3,
                'name' => 'Eventos',
                'icon' => 'event',
                'color' => 'pink',
                'slug' => 55,
                'namespace' => 'App\Strategies\StrategiesPolygons\Villavicencio\StrategyEvents',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'marker_type' => 2,
                'name' => 'Fibra Óptica',
                'icon' => 'cable',
                'color' => 'cyan',
                'slug' => 5,
                'namespace' => 'App\Strategies\StrategiesLines\Villavicencio\StrategyFiberLines',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'marker_type' => 4,
                'name' => 'Incidentes',
                'icon' => 'report',
                'color' => 'orange',
                'slug' => 6,
                'namespace' => 'App\Strategies\StrategiesPoints\Villavicencio\StrategyIncidents',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
