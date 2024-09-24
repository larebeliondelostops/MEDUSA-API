<?php

namespace App\Helpers\Modules\Viper;
use App\Models\Modules\Viper\AlertSeverity;
use Illuminate\Support\Facades\Log;

class AlertCreator
{

    public static function createAlertCumplimientoRequisitosIniciales($projectNumber, $date) // Implementada
    {
        // Convertir la fecha proporcionada a un timestamp
        $fechaAprobacion = strtotime($date);

        // Calcular la diferencia en meses entre la fecha de aprobación y la fecha actual
        $mesesRestantes = ceil((time() - $fechaAprobacion) / (60 * 60 * 24 * 30));
        return [
            "name" => "Recordatorio de cumplimiento requisitos iniciales",
            "description" => 'EL PROYECTO ' . $projectNumber . ' FUE APROBADO EL DÍA ' . $date . ', POR LO TANTO, LA ENTIDAD TIENE ' . $mesesRestantes . ' MESES PARA CUMPLIR REQUISITOS DE EJECUCIÓN E INICIAR EL PROCESO DE CONTRATACIÓN CON EL ACTO ADMINISTRATIVO DE APERTURA.',
            "type" => "SEGUIMIENTO TÉCNICO",
            "severity_id" => AlertSeverity::where('name', 'Low')->first()->id
        ];
    }

    public static function createAlertRevisionContratacion($projectNumber, $date, $requiredDate) // Implementada
    {
        return [
            "name" => "Alerta de revisión por parte del equipo de contratación",
            "description" => 'REVISIÓN INTEGRAL DEL PROYECTO - EL PROYECTO ' . $projectNumber . ' FUE APROBADO EL DÍA ' . $date . ', TIENE CUMPLIMIENTO DE REQUISITOS EL DÍA ' . $requiredDate . ', PARA EVITAR SITUACIONES POR FALLA DE LA PLANEACIÓN SE SUGIERE REVISAR POR EL EQUIPO DE CONTRATACIÓN.',
            "type" => "SEGUIMIENTO JURÍDICO",
            "severity_id" => AlertSeverity::where('name', 'Medium')->first()->id
        ];
    }

    public static function createAlertVencimientoPlazos($projectNumber, $deadline) // Implementada
    {
        return [
            "name" => "Alerta de vencimiento de plazos",
            "description" => 'VENCIMIENTO DE PLAZOS - SE ACERCA LA FECHA LÍMITE PARA COMPLETAR UNA TAREA, ETAPA O ACTIVIDAD DENTRO DEL PROYECTO ' . $projectNumber . '. ES NECESARIO ACTUAR DE MANERA OPORTUNA PARA EVITAR RETRASOS.',
            "type" => "SEGUIMIENTO FINANCIERO",
            "severity_id" => AlertSeverity::where('name', 'Critical')->first()->id
        ];
    }

    public static function createAlertAjustesPlanificacion($projectNumber) // Debe ser manual - No implementada
    {
        return [
            "name" => "Alerta de necesidad de ajustes en la planificación",
            "description" => 'NECESIDAD DE AJUSTES EN LA PLANIFICACIÓN - SE HAN DETECTADO DISCREPANCIAS ENTRE LA PLANIFICACIÓN INICIAL DEL PROYECTO ' . $projectNumber . ' Y SU EJECUCIÓN ACTUAL. SE REQUIEREN AJUSTES PARA MANTENER EL PROYECTO EN CURSO.',
            "type" => "SEGUIMIENTO ADMINISTRATIVO",
            "severity_id" => AlertSeverity::where('name', 'Medium')->first()->id
        ];
    }

    public static function createAlertIncumplimientoSGR($projectNumber)  // Debe ser manual - No implementada
    {
        return [
            "name" => "Alerta de incumplimiento de normativas del SGR",
            "description" => 'INCUMPLIMIENTO DE NORMATIVAS DEL SGR - SE HA IDENTIFICADO QUE EL PROYECTO ' . $projectNumber . ' ESTÁ INFRINGIENDO LAS NORMATIVAS ESTABLECIDAS POR EL SISTEMA GENERAL DE REGALÍAS (SGR). SE DEBEN TOMAR MEDIDAS PARA CORREGIR LAS IRREGULARIDADES.',
            "type" => "SEGUIMIENTO AMBIENTAL SI APLICA",
            "severity_id" => AlertSeverity::where('name', 'Critical')->first()->id
        ];
    }

    public static function createAlertCumplimientoParcialActividades($projectNumber, $startDate, $evaluationDate) // Implementada
    {
        return [
            "name" => "Alerta de cumplimiento parcial de actividades programadas",
            "description" => 'CUMPLIMIENTO PARCIAL DEL CRONOGRAMA - EL PROYECTO ' . $projectNumber . 
            ' FUE INICIADO EL ' . $startDate . ', Y LA EVALUACIÓN DEL MES DE SEGUIMIENTO SE REALIZÓ EL ' . $evaluationDate . 
            '. SE HA DETECTADO QUE EL CONTRATISTA HA EJECUTADO EL PROYECTO SOLO HASTA UN 50% O MÁS DE LAS ACTIVIDADES PROGRAMADAS. ' .
            'ESTE ESTADO SE CONSIDERA CRÍTICO. SE RECOMIENDA IMPLEMENTAR UN PLAN REMEDIAL Y REALIZAR UNA MESA TÉCNICA Y JURÍDICA ENTRE ' . 
            'LA INTERVENTORÍA, LA SUPERVISIÓN Y EL CONTRATISTA PARA RESOLVER LAS CIRCUNSTANCIAS QUE GENERARON EL ATRASO.',
            "type" => "SEGUIMIENTO DE EJECUCIÓN",
            'severity_name' => 'Crítico',
            "severity_id" => AlertSeverity::where('name', 'Critical')->first()->id,
            "recommendations" => [
                'Realizar un plan remedial que garantice el cumplimiento.',
                'Organizar una mesa técnica y jurídica con la Interventoría, Supervisión y Contratista para analizar las causas del retraso.',
                'Definir acciones correctivas y responsables de su implementación en caso de que las demoras sean atribuibles a la entidad pública.'
            ]
        ];
    }
}

