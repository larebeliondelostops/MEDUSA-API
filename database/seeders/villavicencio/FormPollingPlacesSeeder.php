<?php

namespace Database\Seeders\villavicencio;

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
        DB::table('forms')->insert([
            [
                'module' => 7,
                'field' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 7,
                'field' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 7,
                'field' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 7,
                'field' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 7,
                'field' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 7,
                'field' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module' => 7,
                'field' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
