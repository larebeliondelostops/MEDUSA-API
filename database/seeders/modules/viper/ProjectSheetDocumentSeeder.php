<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class ProjectSheetDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    }

    public function createProjectSheetDocumentsForProject($projectId)
    {
        $names = [
            'Matriz General Ajustada MGA',
            'Carta de presentación y solicitud de recursos',
            'Certificación de concordancia con el plan de desarrollo.', 
            'Presupuesto detallado de todas las actividades del proyecto', 
            'Certificado de no financiación con otras fuentes', 
            'Certificación de concordancia con planes de vida y etno-desarrollo', 
            'Certificación de concordancia con Plan de desarrollo Nacional Y de las entidades', 
            'Certificación de no localización en zonas alto riego no mitigable', 
            'Certificación que soporte la inversión', 
            'Diagnóstico, estudios, especificaciones técnicas, diseños, planos',
            'Plano de localización de la zona de influencia del proyecto',
            'Certificado de CUMPLE del DNP',
            'Certificado de Radicación en el Banco de Proyectos Departamental',
            'Documento técnico del Proyecto',
            'Estudios de fase uno (cuando aplique)',
            'acreditar la titularidad del inmueble (Cuando aplique)', 
            'Autorización para la intervención expedida por el ministerio de cultura (Cuando aplique) Para intervención en bienes muebles de interés cultural o arqueológico según corresponda', 
            'Autorización para la intervención expedida por el instituto colombiano de antropología', 
            'Autorización de declaratoria de bien de interés cultural (Cuando aplique)', 
            'copia del acto administrativo de autorización para la intervención expedida por el ministerio de cultura (Cuando aplique)', 
            'constancia del trámite de consulta previa expedida por el ministerio de relaciones exteriores (Cuando aplique)', 
            'Autorización para la intervención a proyectos localizados en un área protegida. (Cuando aplique)', 
            'Certificación de servicios públicos (Cuando aplique)',
            'Certificado de sostenibilidad del proyecto de inversión', 
            'Análisis de riesgo de desastres',
            'Acta de Sesión',
            'Acuerdo',
            'Notificación',
            'Carta de Aceptación del ejecutor del proyecto',
            'Concepto favorable banco de proyectos',
            'Acto administrativo de Incorporación del recurso SGR al Presupuesto',
            'Programación mensual de giros de los recursos del SGR.',
            'Certificado de Registro Presupuestal (CDP)',
            'Licencias definitivas y Permisos previstos cuando hubiere lugar a ello',
            'Solicitud de Cumplimiento de requisitos previos de ejecución por parte de la Secretaría Técnica.',
            'Certificado de Cumplimiento de requisitos previos de ejecución por parte de la Secretaría Técnica',
            'Certificado de la Autoridad Ambiental Cuando aplique',
            'Publicación (SECOP)',
            'Proyecto de pliego de condiciones',
            'Estudios previos ( Planos, estudios técnicos etc.)',
            'Adendas (En caso que los pliegos tengan cambios)',
            'Pliego de condiciones',
            'Acta de Adjudicación',
            'Publicación interventoría (SECOP)',
            'Pliego de condiciones (Interventoría)',
            'Estudios previos ( Estudio de mercado)',
            'Contrato operador del proyecto',
            'Pólizas contrato operador del proyecto',
            'Contrato de interventoria ( Incluida poliza)',
            'Acta de inicio del contrato',
            'Aprobación del cronograma de ejecución teniendo en cuenta el cronograma de ejecución del proyecto',
            'Informes de avance del proyecto (Frente a ejecución de metas, productos e indicadores y cronograma de ejecución).',
            'Informes de interventoría (informes mensuales del interventor, que se deben entregar dentro de los 5 primeros días de cada mes.',
            'Informes de Supervisión',
            'Planes de mejora, PACS/PAP Seguminiento y monitoreo Regalias',
            'Otros (Registro Fotográfico, Audiencias visibles)',
            'Acta de liquidación',
            'Acto administrativo de Cierre del proyecto',
            'Pantallazo GESPROY proyecto CERRADO',
        ];

        foreach ($names as $name) {
            $now = Carbon::now();
            $projectSheetDocument = [
                'project_sheet_id' => DB::table('project_sheets')->where('name', $name)->value('id'),
                'project_id' => $projectId,
                'created_at' => $now,
            ];
            DB::table('project_sheet_document')->insert($projectSheetDocument);
        }
    }
}
