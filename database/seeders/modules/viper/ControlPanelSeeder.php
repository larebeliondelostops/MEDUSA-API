<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ControlPanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namesAndStageControl = [
            ['name' => 'FECHA DE CREACIÓN DE LA MGA', 'stage_control' => 'ETAPA DE FORMULACION Y APROBACIÓN'],
            ['name' => 'FECHA DE LA MESA DE CONCERTACION', 'stage_control' => 'ETAPA DE VIABILIZACIÓN Y REGISTRO BANCO DE PROYECTOS'],
            ['name' => 'INCLUSION AL PLAN DE DESARROLLO', 'stage_control' => 'ETAPA DE VIABILIZACIÓN Y REGISTRO BANCO DE PROYECTOS'],
            ['name' => 'DESCRIPCION CONCEPTOS TECNICOS', 'stage_control'=>'ETAPA DE VIABILIZACIÓN Y REGISTRO BANCO DE PROYECTOS'],
            ['name' => 'FECHA DE LOS CONCEPTOS', 'stage_control'=>'ETAPA DE VIABILIZACIÓN Y REGISTRO BANCO DE PROYECTOS'],
            ['name' => 'VIABILIZACION', 'stage_control' => 'ETAPA DE VIABILIZACIÓN Y REGISTRO BANCO DE PROYECTOS'],
            ['name' => 'REGISTRO BANCO DE PROYECTOS ', 'stage_control' => 'ETAPA DE VIABILIZACIÓN Y REGISTRO BANCO DE PROYECTOS'],
            ['name' => 'FECHA DE APROBACION', 'stage_control' => 'ETAPA DE PRIORIZACIÓN Y APROBACION'],
            ['name' => 'DESCRIPCIÓN DEL DOCUMENTO', 'stage_control' => 'ETAPA DE PRIORIZACIÓN Y APROBACION'],
            ['name' => 'ASIGACIÓN DE RECURSOS', 'stage_control' => 'ETAPA DE PRIORIZACIÓN Y APROBACION'],
            ['name' => 'FECHA CUMPLIMIENTO DE REQUISITOS DE EJECUCION', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'FECHA Y NUMERO DEL ACTO ADMON DE APERTURA DE LA CONTRATACIÓN', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'FECHA Y NUMERO DEL ACTO ADMON QUE ORDENA EL GASTO', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'SUPERVISOR (NOMBRE COMPLETO Y NUMERO TELEFONICO E MAIL)', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'APOYO A LA SUPERVISION ', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'NUMERO DE CONTRATO DEL BIEN SERVICIO Y/O OBRA', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'OBJETO', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'VALOR', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'NOMBRE DEL CONTRATISTA', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'FECHA DE SUSPCRIPCIÓN ', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
            ['name' => 'FECHA ACTA DE INICIO ', 'stage_control' => 'ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'],
        ];   

        foreach ($namesAndStageControl as $item) {
            $now = Carbon::now();
            $controlPanel = [
                'name' => $item['name'],
                'stage_control_id' => DB::table('stage_control')->where('name', $item['stage_control'])->value('id'),
                'created_at' => $now,
            ];
            DB::table('control_panel')->insert($controlPanel);
        }
    }
}
