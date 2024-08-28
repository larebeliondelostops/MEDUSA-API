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
        Log::Info(AlertSeverity::where('name', 'Low')->first()->id);
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
}

