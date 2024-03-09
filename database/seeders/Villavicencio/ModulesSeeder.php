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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Eventos',
                'slug' => 55,
                'description' => 'Módulo para la gestión de eventos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Salud',
                'slug' => 3,
                'description' => 'Módulo para la gestión de salud',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Cais',
                'slug' => 2,
                'description' => 'Módulo para la gestión de cais',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Cámaras',
                'slug' => 50,
                'description' => 'Módulo para la gestión de cámaras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Alarmas',
                'slug' => 1,
                'description' => 'Módulo para la gestión de las alarmas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Mesas de votación',
                'slug' => 4,
                'description' => 'Módulo para la gestión de las mesas de votación (lugares)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
