<?php

namespace Database\Seeders\Viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
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
        DB::connection('villavicencio')->table('municipalities')->insert([
            [
                "name" => "Formulación",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Presentado",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "En viabilidad",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Viable",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "No viable",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "En ejecución",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "En ajustes",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Aprobado",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "No aprobado",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Terminado",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
