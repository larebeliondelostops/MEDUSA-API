<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
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
        DB::connection('villavicencio')->table('menu')->insert([
            [
                'id' => 1,
                'name' => 'Mapa',
                'path' => 'map',
                'icon' => 'public',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Eventos',
                'path' => 'events',
                'icon' => 'event',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Salud',
                'path' => 'health',
                'icon' => 'health_and_safety',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Gobierno',
                'path' => 'government',
                'icon' => 'assured_workload',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Marcadores',
                'path' => 'markers',
                'icon' => 'place',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Usuarios',
                'path' => 'users',
                'icon' => 'person',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('menu')->insert([
            [
                'id' => 1,
                'name' => 'Mapa',
                'path' => 'map',
                'icon' => 'public',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Eventos',
                'path' => 'events',
                'icon' => 'event',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Salud',
                'path' => 'health',
                'icon' => 'health_and_safety',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Gobierno',
                'path' => 'government',
                'icon' => 'assured_workload',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Marcadores',
                'path' => 'markers',
                'icon' => 'place',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Usuarios',
                'path' => 'users',
                'icon' => 'person',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
