<?php


namespace Database\Seeders\Ditra;

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
                'name' => 'Incidentes',
                'icon' => 'error',
                'color' => 'red',
                'slug' => 1,
                'namespace' => 'App\Strategies\StrategiesPoints\Ditra\StrategyIncidents',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'marker_type' => 1,
                'name' => 'Peajes',
                'icon' => 'signpost',
                'color' => 'yellow',
                'slug' => 2,
                'namespace' => 'App\Strategies\StrategiesPoints\Ditra\StrategyTollbooth',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'marker_type' => 1,
                'name' => 'Cámaras',
                'icon' => 'videocam',
                'color' => 'blue',
                'slug' => 50,
                'namespace' => 'App\Strategies\StrategiesPoints\Ditra\StrategyCameras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'marker_type' => 4,
                'name' => 'Modelo Probabilistico',
                'icon' => 'data_usage',
                'color' => 'cyan',
                'slug' => 51,
                'namespace' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'marker_type' => 4,
                'name' => 'Mapa de Calor',
                'icon' => 'local_fire_department',
                'color' => 'lightgreen',
                'slug' => 52,
                'namespace' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'marker_type' => 4,
                'name' => 'Tráfico',
                'icon' => 'traffic',
                'color' => 'blue',
                'slug' => 53,
                'namespace' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'marker_type' => 4,
                'name' => 'Unidades móviles',
                'icon' => 'radar',
                'color' => 'orange',
                'slug' => 54,
                'namespace' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
