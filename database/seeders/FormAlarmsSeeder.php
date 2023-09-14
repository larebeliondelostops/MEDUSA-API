<?php

namespace Database\Seeders;

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
        DB::connection('villavicencio')->table('forms')->insert([
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

        /**
         * Marcadores para neiva
         */
        /* DB::connection('neiva')->table('menu')->insert([
            [
                'id' => 1,
                'name' => 'CREAR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'ACTUALIZAR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'BORRAR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]); */
    }
}
