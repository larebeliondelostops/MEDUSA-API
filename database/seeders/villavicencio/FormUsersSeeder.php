<?php

namespace Database\Seeders\villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormUsersSeeder extends Seeder
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
                //'id' => 1,
                'module' => 1,
                'field' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                //'id' => 2,
                'module' => 1,
                'field' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                //'id' => 3,
                'module' => 1,
                'field' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                //'id' => 4,
                'module' => 1,
                'field' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                //'id' => 5,
                'module' => 1,
                'field' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
