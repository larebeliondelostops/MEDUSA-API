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
                'name' => 'Ambiente y Desarrollo Rural',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ambiente y Desarrollo Sostenible',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ciencia, Tecnología e Innovación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Comercio, Industria y Turismo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cultura',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deporte y Recreación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Educación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gobierno Territorial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inclusión Social y Reconciliación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Información Estadistica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Justicia y del Derecho',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Minas y Energía',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salud y Protección Social',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tecnologías de la Información y las Comunicaciones',
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
                'name' => 'Vivienda, Ciudad y Territorio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
