<?php

namespace Database\Seeders\Ditra;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
         * Marcadores para ditra
         */
        DB::table('slugs')->insert([
            [
                'id' => 1,
                'name' => 'incident',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
              'id' => 2,
              'name' => 'tolls',
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
              'name' => 'probabilisticGrid',
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
        ]);
    }
}