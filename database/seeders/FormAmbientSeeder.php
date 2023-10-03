<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormAmbientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('forms')->insert([
            [
                //'id' => 1,
                'module' => 4,
                'field' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                //'id' => 2,
                'module' => 4,
                'field' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
