<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeMarkersSeeder extends Seeder
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
        DB::connection('villavicencio')->table('type_marker')->insert([
            [
                'id' => 1,
                'name' => 'Alarmas',
                'icon' => 'notifications_active',
                'color' => 'yellow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Cais',
                'icon' => 'local_police',
                'color' => 'green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Salud',
                'icon' => 'health_and_safety',
                'color' => 'red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Puestos de votación',
                'icon' => 'how_to_vote',
                'color' => 'purple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Fibra Óptica',
                'icon' => 'cable',
                'color' => 'cyan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 50,
                'name' => 'Camaras',
                'icon' => 'videocam',
                'color' => 'blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 51,
                'name' => 'Modelo Probabilistico',
                'icon' => 'data_usage',
                'color' => 'cyan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 52,
                'name' => 'Mapa de Calor',
                'icon' => 'local_fire_department',
                'color' => 'lightgreen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 53,
                'name' => 'Tráfico',
                'icon' => 'traffic',
                'color' => 'bluegreen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 54,
                'name' => 'Unidades móviles',
                'icon' => 'radar',
                'color' => 'orange',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 55,
                'name' => 'Eventos',
                'icon' => 'event',
                'color' => 'pink',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('type_marker')->insert([
            [
                'id' => 1,
                'name' => 'Fibra Óptica SIES',
                'icon' => 'e911_emergency',
                'color' => 'yellow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Fibra Óptica de Cámaras',
                'icon' => 'videocam',
                'color' => 'blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Alumbrado Público',
                'icon' => 'emoji_objects',
                'color' => 'green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Ambiente',
                'icon' => 'eco',
                'color' => 'purple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Escenarios Deportivos',
                'icon' => 'sports_soccer',
                'color' => 'pink',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Movilidad',
                'icon' => 'traffic',
                'color' => 'orange',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Salud',
                'icon' => 'health_and_safety',
                'color' => 'red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Sedes las Ceibas EPN',
                'icon' => 'water_drop',
                'color' => 'cyan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Seguridad Ciudadana',
                'icon' => 'local_police',
                'color' => 'lightgreen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Zonas Digitales',
                'icon' => 'share',
                'color' => 'bluegreen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => 'Sedes Educativas',
                'icon' => 'school',
                'color' => 'cyan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 50,
                'name' => 'Camaras',
                'icon' => 'videocam',
                'color' => 'blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 51,
                'name' => 'Modelo Probabilistico',
                'icon' => 'data_usage',
                'color' => 'cyan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 52,
                'name' => 'Mapa de Calor',
                'icon' => 'local_fire_department',
                'color' => 'lightgreen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 53,
                'name' => 'Tráfico',
                'icon' => 'traffic',
                'color' => 'bluegreen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
