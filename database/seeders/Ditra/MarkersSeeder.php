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
                'icon' => 'local_police',
                'color' => 'green',
                'slug' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'marker_type' => 1,
                'name' => 'Peajes',
                'icon' => 'traffic',
                'color' => 'red',
                'slug' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 50,
                'marker_type' => 1,
                'name' => 'Cámaras',
                'icon' => 'traffic',
                'color' => 'blue',
                'slug' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 52,
                'marker_type' => 5,
                'name' => 'Mapa de Calor',
                'icon' => 'local_fire_department',
                'color' => 'lightgreen',
                'slug' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 53,
                'marker_type' => 5,
                'name' => 'Tráfico',
                'icon' => 'videocam',
                'color' => 'blue',
                'slug' => 53,
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
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
