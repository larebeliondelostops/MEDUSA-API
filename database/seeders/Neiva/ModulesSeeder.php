<?php

namespace Database\Seeders\Neiva;

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
         * Marcadores para neiva
         */
        DB::table('modules')->insert([
            [
                'id' => 3,
                'name' => 'Alumbrado Público',
                'description' => 'Módulo para la gestión del alumbrado público',
                'slug' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Ambiente',
                'description' => 'Módulo para la gestión del tema ambiental',
                'slug' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Escenarios Deportivos',
                'description' => 'Módulo para la gestión de los escenarios deportivos',
                'slug' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Movilidad',
                'description' => 'Módulo para la gestión de la movilidad',
                'slug' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Salud',
                'description' => 'Módulo para la gestión de la salud',
                'slug' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Sedes las Ceibas EPN',
                'description' => 'Módulo para la gestión de las sedes las Ceibas EPN',
                'slug' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Seguridad Ciudadana',
                'description' => 'Módulo para la gestión de la seguridad ciudadana',
                'slug' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Zonas Digitales',
                'description' => 'Módulo para la gestión de las zonas digitales',
                'slug' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => 'Sedes Educativas',
                'description' => 'Módulo para la gestión de las sedes educativas',
                'slug' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 50,
                'name' => 'Camaras',
                'description' => 'Módulo para la gestión de las cámaras',
                'slug' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
