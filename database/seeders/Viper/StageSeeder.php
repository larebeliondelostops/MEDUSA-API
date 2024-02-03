<?php

namespace Database\Seeders\Viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
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
        DB::connection('villavicencio')->table('stages')->insert([
            [
                'name' => 'Formulación / Presentación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Viabilidad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Programación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ejecución',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Operación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cierre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
