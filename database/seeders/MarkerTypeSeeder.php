<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkerTypeSeeder extends Seeder
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
        DB::connection('villavicencio')->table('marker_type')->insert([
            [
                'id' => 1,
                'name' => 'Point',
                'description' => 'Todos los marcadores de tipo punto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Polyline',
                'description' => 'Todos los marcadores de tipo linea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Polygon',
                'description' => 'Todos los marcadores de tipo poligono',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Point And Polyline',
                'description' => 'Todos los marcadores de tipo punto y linea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Special',
                'description' => 'Todos los marcadores de tipo especial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('marker_type')->insert([
            [
                'id' => 1,
                'name' => 'Point',
                'description' => 'Todos los marcadores de tipo punto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Polyline',
                'description' => 'Todos los marcadores de tipo linea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Polygon',
                'description' => 'Todos los marcadores de tipo poligono',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Point And Polyline',
                'description' => 'Todos los marcadores de tipo punto y linea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Special',
                'description' => 'Todos los marcadores de tipo especial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
