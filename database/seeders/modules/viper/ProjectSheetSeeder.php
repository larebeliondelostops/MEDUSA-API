<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ProjectSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namesAndLocations = [
            ['name' => 'Matriz General Ajustada MGA', 'location' => 'Presentación'],
            ['name' => 'Carta de presentación y solicitud de recursos', 'location' => 'Presentación'],
            ['name' => 'Certificación de concordancia con el plan de desarrollo.', 'location' => 'Viabilización'],
            ['name' => 'Presupuesto detallado de todas las actividades del proyecto', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos financieros'],
            ['name' => 'Certificado de no financiación con otras fuentes', 'location' => 'Viabilización'],
            ['name' => 'Certificación de concordancia con planes de vida y etno-desarrollo', 'location' => 'Viabilización'],
            ['name' => 'Certificación de concordancia con Plan de desarrollo Nacional Y de las entidades', 'location' => 'Viabilización'],
            ['name' => 'Certificación de no localización en zonas alto riego no mitigable', 'location' => 'Viabilización'],
            ['name' => 'Certificación que soporte la inversión', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos financieros'],
            ['name' => 'Diagnóstico, estudios, especificaciones técnicas, diseños, planos', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos técnicos'],
            ['name' => 'Plano de localización de la zona de influencia del proyecto', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos técnicos'],
            ['name' => 'Certificado de CUMPLE del DNP', 'location' => 'Ejecución/Actuaciones de los órganos de control/DNP/Visita de seguimiento del proyecto'],
            ['name' => 'Certificado de Radicación en el Banco de Proyectos Departamental', 'location' => 'Ejecución/Actuaciones de los órganos de control/DNP/Visita de seguimiento del proyecto'],
            ['name' => 'Documento técnico del Proyecto', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos técnicos'],
            ['name' => 'Estudios de fase uno (cuando aplique)', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos técnicos'],
            ['name' => 'acreditar la titularidad del inmueble (Cuando aplique)', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'Autorización para la intervención expedida por el ministerio de cultura (Cuando aplique) Para intervención en bienes muebles de interés cultural o arqueológico según corresponda', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'Autorización para la intervención expedida por el instituto colombiano de antropología', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'Autorización de declaratoria de bien de interés cultural (Cuando aplique)', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'copia del acto administrativo de autorización para la intervención expedida por el ministerio de cultura (Cuando aplique)', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'constancia del trámite de consulta previa expedida por el ministerio de relaciones exteriores (Cuando aplique)', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'Autorización para la intervención a proyectos localizados en un área protegida. (Cuando aplique)', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'Certificación de servicios públicos (Cuando aplique)', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos técnicos'],
            ['name' => 'Certificado de sostenibilidad del proyecto de inversión', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos financieros'],
            ['name' => 'Análisis de riesgo de desastres', 'location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos técnicos'],
        ];   


        foreach ($namesAndLocations as $item) {
            $now = Carbon::now();
            $projectSheet = [
                'name' => $item['name'],
                'location' => $item['location'],
                'phase_id' => DB::table('phases')->where('name', 'APROBACION DEL PROYECTO')->value('id'),
                'created_at' => $now,
            ];
            DB::table('project_sheets')->insert($projectSheet);
        }

        $namesAndLocations = [
            ['name' => 'Acta de Sesión','location' => 'Ejecución'],
            ['name' => 'Acuerdo','location' => 'Ejecución'],
            ['name' => 'Notificación','location' => 'Ejecución'],
            ['name' => 'Carta de Aceptación del ejecutor del proyecto','location' => 'Programación/Ejecutor del proyecto'],
            ['name' => 'Concepto favorable banco de proyectos','location' => 'Ejecución'],
            ['name' => 'Acto administrativo de Incorporación del recurso SGR al Presupuesto','location' => 'Ejecución'],
            ['name' => 'Programación mensual de giros de los recursos del SGR.','location' => 'Programación/Gesproy/Programación inicial'],
            ['name' => 'Certificado de Registro Presupuestal (CDP)','location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos financieros'],
            ['name' => 'Licencias definitivas y Permisos previstos cuando hubiere lugar a ello','location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'Solicitud de Cumplimiento de requisitos previos de ejecución por parte de la Secretaría Técnica.','location' => 'Programación/ Requisitos previos de ejecución/Certificado de cumplimiento de requisitos previos de ejecución'],
            ['name' => 'Certificado de Cumplimiento de requisitos previos de ejecución por parte de la Secretaría Técnica','location' => 'Programación/ Requisitos previos de ejecución/Requisitos previos al cumplimiento de ejecución del proyecto/Requisitos previos al cumplimiento de ejecución del proyecto'],
            ['name' => 'Certificado de la Autoridad Ambiental Cuando aplique','location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos jurídicos'],
            ['name' => 'Publicación (SECOP)','location' => 'Ejecución'],
            ['name' => 'Proyecto de pliego de condiciones','location' => 'Ejecución'],
            ['name' => 'Estudios previos ( Planos, estudios técnicos etc.)','location' => 'Viabilización/Viabilización - Estructura del proyecto/Aspectos técnicos'],
            ['name' => 'Adendas (En caso que los pliegos tengan cambios)','location' => 'Ejecución/Contratos del proyecto/Interventoría/Precontractual'],
            ['name' => 'Pliego de condiciones','location' => 'Ejecución/Contratos del proyecto/Interventoría/Precontractual'],
            ['name' => 'Acta de Adjudicación','location' => 'Ejecución/Contratos del proyecto/Interventoría/Contractual'],
            ['name' => 'Publicación interventoría (SECOP)','location' => 'Ejecución/Contratos del proyecto/Apoyo a la supervisión/Ejecución'],
            ['name' => 'Pliego de condiciones (Interventoría)','location' => 'Ejecución/Contratos del proyecto/Apoyo a la supervisión/Precontractual'],
            ['name' => 'Estudios previos ( Estudio de mercado)','location' => 'Ejecución/Contratos del proyecto/Apoyo a la supervisión/Precontractual'],
        ];

        foreach ($namesAndLocations as $item) {
            $now = Carbon::now();
            $projectSheet = [
                'name' => $item['name'],
                'location' => $item['location'],
                'phase_id' => DB::table('phases')->where('name', 'APROBACION-FASE PRECONTRACTUAL')->value('id'),
                'created_at' => $now,
            ];
            DB::table('project_sheets')->insert($projectSheet);
        }

        $namesAndLocations = [
            ['name' => 'Contrato operador del proyecto','location' => 'Ejecución/Contratos del proyecto/Obra bien o Servicio/Contractual'],
            ['name' => 'Pólizas contrato operador del proyecto','location' => 'Ejecución/Contratos del proyecto/Obra bien o Servicio/Contractual'],
            ['name' => 'Contrato de interventoria ( Incluida poliza)','location' => 'Ejecución/Contratos del proyecto/Obra bien o Servicio/Contractual'],
            ['name' => 'Acta de inicio del contrato','location' => 'Ejecución/Contratos del proyecto/Obra bien o Servicio/Ejecución'],
            ['name' => 'Aprobación del cronograma de ejecución teniendo en cuenta el cronograma de ejecución del proyecto','location' => 'Programación/Gesproy/Programación inicial'],
            ['name' => 'Informes de avance del proyecto (Frente a ejecución de metas, productos e indicadores y cronograma de ejecución).','location' => 'Ejecución/CARPETA GESPROY/Reporte de Ejecución'],
            ['name' => 'Informes de interventoría (informes mensuales del interventor, que se deben entregar dentro de los 5 primeros días de cada mes.','location' => 'Ejecución/Contratos del proyecto/Interventoría/Ejecución'],
            ['name' => 'Informes de Supervisión','location' => 'Ejecución/Contratos del proyecto/Apoyo a la supervisión/Ejecución'],
            ['name' => 'Planes de mejora, PACS/PAP Seguminiento y monitoreo Regalias','location' => 'Ejecución'],
            ['name' => 'Otros (Registro Fotográfico, Audiencias visibles)','location' => 'Ejecución'],
        ];

        foreach ($namesAndLocations as $item) {
            $now = Carbon::now();
            $projectSheet = [
                'name' => $item['name'],
                'location' => $item['location'],
                'phase_id' => DB::table('phases')->where('name', 'FASE CONTRACTUAL')->value('id'),
                'created_at' => $now,
            ];
            DB::table('project_sheets')->insert($projectSheet);
        }

        $namesAndLocations = [
            ['name' => 'Acta de liquidación','location' => 'Cierre/Cierre de Proyecto'],
            ['name' => 'Acto administrativo de Cierre del proyecto','location' => 'Cierre/Cierre de Proyecto'],
            ['name' => 'Pantallazo GESPROY proyecto CERRADO','location' => 'Cierre/Cierre de Proyecto'],
        ];

        foreach ($namesAndLocations as $item) {
            $now = Carbon::now();
            $projectSheet = [
                'name' => $item['name'],
                'location' => $item['location'],
                'phase_id' => DB::table('phases')->where('name', 'FASE POSTCONTRACTUAL')->value('id'),
                'created_at' => $now,
            ];
            DB::table('project_sheets')->insert($projectSheet);
        }
    }
}
