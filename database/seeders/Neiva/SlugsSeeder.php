<?php

namespace Database\Seeders\Neiva;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SlugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * 
         * Marcadores para neiva
         */
        DB::table('slugs')->insert([
            [
              'id' => 1,
              'name' => 'fiber_optic_sies',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 2,
              'name' => 'fiber_optic_cameras',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 3,
              'name' => 'public_lighting',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 4,
              'name' => 'ambient',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 5,
              'name' => 'sports_venues',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 6,
              'name' => 'mobility',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 7,
              'name' => 'health',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 8,
              'name' => 'headquarters_las_ceibas_epn',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 9,
              'name' => 'public_safety',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 10,
              'name' => 'digital_zones',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 11,
              'name' => 'educational_centers',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 50,
              'name' => 'cameras',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 51,
              'name' => 'model_probabilistic',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 52,
              'name' => 'heat_map',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 53,
              'name' => 'traffic',
              'created_at' => now(),
              'updated_at' => now(),  
            ]
        ]);
    }
}
