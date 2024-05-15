<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
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
        DB::table('sectors')->insert([
            [
                'name' => 'Ambiente y desarrollo rural',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ambiente y desarrollo sostenible',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ciencia, tecnología e innovación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Comercio, industria y turismo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cultura',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deporte y recreación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Educación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gobierno territorial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inclusión social y reconciliación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Información estadistica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Justicia y del derecho',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Minas y energía',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salud y protección Social',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tecnologías de la información y las comunicaciones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trabajo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Transporte',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vivienda, ciudad y territorio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
