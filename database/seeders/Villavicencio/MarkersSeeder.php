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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'marker_type' => 1,
                'name' => 'Cais',
                'icon' => 'local_police',
                'color' => 'green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'marker_type' => 1,
                'name' => 'Salud',
                'icon' => 'health_and_safety',
                'color' => 'red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'marker_type' => 1,
                'name' => 'Puestos de votación',
                'icon' => 'how_to_vote',
                'color' => 'purple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'marker_type' => 4,
                'name' => 'Fibra Óptica',
                'icon' => 'cable',
                'color' => 'cyan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 50,
                'marker_type' => 1,
                'name' => 'Camaras',
                'icon' => 'videocam',
                'color' => 'blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 51,
                'marker_type' => 5,
                'name' => 'Modelo Probabilistico',
                'icon' => 'data_usage',
                'color' => 'cyan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 52,
                'marker_type' => 5,
                'name' => 'Mapa de Calor',
                'icon' => 'local_fire_department',
                'color' => 'lightgreen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 53,
                'marker_type' => 5,
                'name' => 'Tráfico',
                'icon' => 'traffic',
                'color' => 'bluegreen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 54,
                'marker_type' => 1,
                'name' => 'Unidades móviles',
                'icon' => 'radar',
                'color' => 'orange',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 55,
                'marker_type' => 3,
                'name' => 'Eventos',
                'icon' => 'event',
                'color' => 'pink',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // viper
            [
                'id' => 100,
                'marker_type' => 1,
                'name' => 'Proyectos',
                'icon' => 'location_on',
                'color' => 'blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
