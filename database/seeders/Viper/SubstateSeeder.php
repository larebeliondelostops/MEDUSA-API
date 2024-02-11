<?php

namespace Database\Seeders\Viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubstateSeeder extends Seeder
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
        DB::table('substates')->insert([
            [
                'name' => 'Formulación',
                'state_id' => 1, // Relacionado con "Formulación"
            ],
            [
                'name' => 'En proceso de viabilidad',
                'state_id' => 3, // Relacionado con "En viabilidad"
            ],
            [
                'name' => 'Devuelto a MGA',
                'state_id' => 4, // Relacionado con "Viable" o "No viable"
            ],
            [
                'name' => 'Sin contratar (SGR)',
                'state_id' => 8, // Relacionado con "En ejecución"
            ],
            [
                'name' => 'En proceso de contratación (SGR)',
                'state_id' => 8, // Relacionado con "En ejecución"
            ],
            [
                'name' => 'Contratado en ejecución (SGR)',
                'state_id' => 8, // Relacionado con "En ejecución"
            ],
            [
                'name' => 'Contratado sin acta de inicio (SGR)',
                'state_id' => 8, // Relacionado con "En ejecución"
            ],
            [
                'name' => 'Para cierre (SGR)',
                'state_id' => 10, // Relacionado con "Terminado"
            ],
            [
                'name' => 'Cerrado (SGR)',
                'state_id' => 10, // Relacionado con "Terminado"
            ],
        ]);
    }
}
