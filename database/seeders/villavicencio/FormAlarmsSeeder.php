<?php

namespace Database\Seeders\villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormAlarmsSeeder extends Seeder
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
                'module' => 6,
                'field' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                //'id' => 2,
                'module' => 6,
                'field' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                //'id' => 3,
                'module' => 6,
                'field' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
