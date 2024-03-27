<?php

namespace Database\Seeders;

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
        DB::connection('villavicencio')->table('slugs')->insert([
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
              'id' => 50,
              'name' => 'camera',
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

        /**
         * Marcadores para ditra
         */
        DB::connection('ditra')->table('slugs')->insert([
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
              'id' => 50,
              'name' => 'camera',
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

        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('slugs')->insert([
            [
              'id' => 4,
              'name' => 'ambient',
              'created_at' => now(),
              'updated_at' => now(),
            ],
        ]);
    }
}
