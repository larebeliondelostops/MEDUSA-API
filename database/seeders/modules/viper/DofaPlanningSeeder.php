<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class DofaPlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namesAndItems = [
            ['name' => 'APROBACIÓN DEL PROYECTO', 'item' => '1'],
            ['name' => 'ACTA', 'item' => '1.1'],
            ['name' => 'ACUERDO', 'item' => '1.2'],
            ['name' => 'COMUNICACIÓN', 'item' => '1.3'],
            ['name' => 'ACEPTACIÓN DE EJECUTOR', 'item' => '1.4'],
            ['name' => 'REGISTRO EN EL APLICATIVO DE EJECUTOR - MIGRACIÓN AL GESPROY', 'item' => '1.5'],
            ['name' => 'CUMPLIMIENTO DE REQUISITOS', 'item' => '2'],
            ['name' => 'INCORPORACIÓN MEDIANTE ACTO ADMON', 'item' => '2.1'],
            ['name' => 'CERTIFICACIONES DEL ACUERDO', 'item' => '2.2'],
            ['name' => 'ACTUALIZACIÓN GESPROY', 'item' => '2.3'],
            ['name' => 'ACTUALIZACIÓN SPGR', 'item' => '2.4'],
            ['name' => 'EMISION DE CDS SEGÚN ACTIVIDADES', 'item' => '2.5'],
            ['name' => 'CARTA SOLICITUD DE CUMPLIMIENTO DE REQUISITOS', 'item' => '2.6'],
            ['name' => 'CERTIFICADO DE CUMPLIMIENTO DE REQUISITOS', 'item' => '2.7'],
            ['name' => 'CONTRATACIÓN', 'item' => '3'],
            ['name' => 'CONTRATACIÓN DE APOYO A LA SUPERVISION', 'item' => '3.1'],
            ['name' => 'SOLICITUD DE CONTRATACIÓN', 'item' => '3.1.1'],
            ['name' => 'ESTUDIOS PREVIOS', 'item' => '3.1.2'],
            ['name' => 'SOLICUTUD DE OFERTA', 'item' => '3.1.3'],
            ['name' => 'ENTREGA DE OFERTA', 'item' => '3.1.4'],
            ['name' => 'VERIFICACION DE LA OFERTA', 'item' => '3.1.5'],
            ['name' => 'MINUTA CONTRACTUAL', 'item' => '3.1.6'],
            ['name' => 'REGISTRO PRESUPUESTAL', 'item' => '3.1.7'],
            ['name' => 'GARANTIA UNICA', 'item' => '3.1.8'],
            ['name' => 'APROBACIÓN DE POLIZA', 'item' => '3.1.9'],
            ['name' => 'ACTA DE INICIO', 'item' => '3.1.10'],
            ['name' => 'CONTRATACION DEL OPERADOR', 'item' => '3.2'],
            ['name' => 'SOLICITUD DE CONTRATACIÓN', 'item' => '3.2.1'],
            ['name' => 'ESTUDIOS PREVIOS', 'item' => '3.2.2'],
            ['name' => 'ESTUDIOS DEL SECTOR', 'item' => '3.2.3'],
            ['name' => 'ELABORACIÓN DEL FORMULARIO', 'item' => '3.2.4'],
            ['name' => 'ACTO DE APERTURA', 'item' => '3.2.5'],
            ['name' => 'PUBLICACION DEL FORMULARIO', 'item' => '3.2.6'],
            ['name' => 'OBSERVACIONES', 'item' => '3.2.7'],
            ['name' => 'ADENDAS SI HAY LUGAR', 'item' => '3.2.8'],
            ['name' => 'CIERRE Y RESIVO DE OFERTAS', 'item' => '3.2.9'],
            ['name' => 'EVALUACION DE OFERTAS', 'item' => '3.2.10'],
            ['name' => 'PUBLICACION DE EVALUACION', 'item' => '3.2.11'],
            ['name' => 'OBSERVACIONES A LA EVALUACION', 'item' => '3.2.12'],
            ['name' => 'EVALUACION FINAL SI HAY MODIFICACION', 'item' => '3.2.13'],
            ['name' => 'ADJUDICACION', 'item' => '3.2.14'],
            ['name' => 'SUSCRIPCION DEL CONTRATO', 'item' => '3.2.15'],
        ];   


        foreach ($namesAndItems as $item) {
            $now = Carbon::now();
            $dofaPlanning  = [
                'name' => $item['name'],
                'item' => $item['item'],
                'created_at' => $now,
            ];
            DB::table('dofa_planning')->insert($dofaPlanning);
        }
    }
}
