<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class StageControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'ETAPA DE FORMULACION Y APROBACIÓN',
            'ETAPA DE VIABILIZACIÓN Y REGISTRO BANCO DE PROYECTOS',
            'ETAPA DE PRIORIZACIÓN Y APROBACION',
            'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL',
        ];   

        foreach ($names as $name) {
            $now = Carbon::now();
            $stageControl = [
                'name' => $name,
                'created_at' => $now,
            ];
            DB::table('stage_control')->insert($stageControl);
        }
    }
}
