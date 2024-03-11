<?php


namespace Database\Seeders\Neiva;

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
         * Marcadores para neiva
         */
        DB::table('marker')->insert([
            [
                'id' => 1,
                'marker_type' => 4,
                'name' => 'Fibra Óptica SIES',
                'icon' => 'e911_emergency',
                'color' => 'yellow',
                'slug' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'marker_type' => 4,
                'name' => 'Fibra Óptica de Cámaras',
                'icon' => 'videocam',
                'color' => 'blue',
                'slug' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'marker_type' => 1,
                'name' => 'Alumbrado Público',
                'icon' => 'emoji_objects',
                'color' => 'green',
                'slug' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'marker_type' => 1,
                'name' => 'Ambiente',
                'icon' => 'eco',
                'color' => 'purple',
                'slug' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'marker_type' => 1,
                'name' => 'Escenarios Deportivos',
                'icon' => 'sports_soccer',
                'color' => 'pink',
                'slug' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'marker_type' => 1,
                'name' => 'Movilidad',
                'icon' => 'traffic',
                'color' => 'orange',
                'slug' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'marker_type' => 1,
                'name' => 'Salud',
                'icon' => 'health_and_safety',
                'color' => 'red',
                'slug' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'marker_type' => 1,
                'name' => 'Sedes las Ceibas EPN',
                'icon' => 'water_drop',
                'color' => 'cyan',
                'slug' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'marker_type' => 1,
                'name' => 'Seguridad Ciudadana',
                'icon' => 'local_police',
                'color' => 'lightgreen',
                'slug' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'marker_type' => 1,
                'name' => 'Zonas Digitales',
                'icon' => 'share',
                'color' => 'bluegreen',
                'slug' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'marker_type' => 1,
                'name' => 'Sedes Educativas',
                'icon' => 'school',
                'color' => 'cyan',
                'slug' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 50,
                'marker_type' => 5,
                'name' => 'Camaras',
                'icon' => 'videocam',
                'color' => 'blue',
                'slug' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 51,
                'marker_type' => 5,
                'name' => 'Modelo Probabilistico',
                'icon' => 'data_usage',
                'color' => 'cyan',
                'slug' => 51, // 'model_probabilistic'
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
                'icon' => 'traffic',
                'color' => 'bluegreen',
                'slug' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
