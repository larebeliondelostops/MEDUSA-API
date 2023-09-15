<?php

namespace Database\Seeders;

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
        DB::connection('villavicencio')->table('modules')->insert([
            [
                'id' => 1,
                'name' => 'Usuarios',
                'description' => 'Módulo para la gestión de usuarios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Eventos',
                'description' => 'Módulo para la gestión de eventos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Salud',
                'description' => 'Módulo para la gestión de salud',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Gobierno',
                'description' => 'Módulo para la gestión de gobierno',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Cámaras',
                'description' => 'Módulo para la gestión de cámaras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Alarmas',
                'description' => 'Módulo para la gestión de las alarmas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Mesas de votación',
                'description' => 'Módulo para la gestión de las mesas de votación (lugares)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('modules')->insert([
            [
                'id' => 6,
                'name' => 'Alarmas',
                'description' => 'Módulo para la gestión de las alarmas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
