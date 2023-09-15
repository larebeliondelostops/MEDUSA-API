<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormPollingPlacesSeeder extends Seeder
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
        DB::connection('villavicencio')->table('forms')->insert([
            [
                'module' => 6,
                'field' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 6,
                'field' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 6,
                'field' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 6,
                'field' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 6,
                'field' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 6,
                'field' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para neiva
         */
        /* DB::connection('neiva')->table('forms')->insert([
            [
                'module' => 6,
                'field' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 6,
                'field' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 6,
                'field' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]); */
    }
}
