<?php

namespace Database\Seeders\Villavicencio;

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
         * Marcadores para villavicencio
         */
        DB::table('slugs')->insert([
            [
                'id' => 1,
                'name' => 'alarm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
              'id' => 2,
              'name' => 'cai',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 3,
              'name' => 'entity',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 4,
              'name' => 'pollingPlace',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 5,
              'name' => 'fiber',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 6,
              'name' => 'incident',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 7,
              'name' => 'ipat',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 8,
              'name' => 'trafficLight',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 10,
              'name' => 'user',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 50,
              'name' => 'camera',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 51,
              'name' => 'probabilisticModel',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 52,
              'name' => 'heatmap',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 53,
              'name' => 'traffic',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 54,
              'name' => 'movementUnity',
              'created_at' => now(),
              'updated_at' => now(),
            ],
            [
              'id' => 55,
              'name' => 'event',
              'created_at' => now(),
              'updated_at' => now(),
            ],
        ]);
    }
}
