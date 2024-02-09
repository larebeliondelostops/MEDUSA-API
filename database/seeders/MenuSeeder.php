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
                'slug' => 'map',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Eventos',
                'path' => 'markers/event',
                'icon' => 'event',
                'slug' => 'event',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Salud',
                'path' => 'markers/health',
                'icon' => 'health_and_safety',
                'slug' => 'health',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Viper',
                'path' => 'viper',
                'icon' => 'assured_workload',
                'slug' => 'viper',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Marcadores',
                'path' => NULL,
                'icon' => 'place',
                'slug' => 'markers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Usuarios',
                'path' => 'users',
                'icon' => 'person',
                'slug' => 'users',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para ditra
         */
        DB::connection('ditra')->table('menu')->insert([
            [
                'id' => 1,
                'name' => 'Mapa',
                'path' => 'map',
                'icon' => 'public',
                'slug' => 'map',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Reportes',
                'path' => 'reports',
                'icon' => 'query_stats',
                'slug' => 'report',
                'created_at' => now(),
                'updated_at' => now(),
            ]
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
                'slug' => 'map',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Eventos',
                'path' => 'markers/event',
                'icon' => 'event',
                'slug' => 'event',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Salud',
                'path' => 'markers/health',
                'icon' => 'health_and_safety',
                'slug' => 'health',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Gobierno',
                'path' => 'markers/government',
                'icon' => 'assured_workload',
                'slug' => 'government',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Marcadores',
                'path' => 'markers',
                'icon' => 'place',
                'slug' => 'markers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Usuarios',
                'path' => 'users',
                'icon' => 'person',
                'slug' => 'users',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
