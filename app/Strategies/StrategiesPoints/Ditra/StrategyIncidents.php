<?php

namespace App\Strategies\StrategiesPoints\Ditra;

use App\Models\Ditra\Incident;
use App\Models\Ditra\DataDitra;
use App\Interfaces\Markers\PointsInterface;

class StrategyIncidents implements PointsInterface
{
    public function __construct(
        private Incident $model,
        private DataDitra $modelDataDitra
    ) {}

    public function getModel() : Incident
    {
        return $this->model;
    }
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public function allPoints()
    {
        $incidents = $this->getModel()->allPoints();

        $datosDataDitra = $this->modelDataDitra->allPoints();

        if (isset($incidents)) {
            $incidents = $incidents->merge($datosDataDitra);
        } else {
            $incidents = $datosDataDitra;
        }

        return $incidents;
    }



    public function getInfoPoint($uuid)
    {
        $data = $this->getModel()->where('uuid', $uuid)->first();

        if (isset($data)) {
            $data = [
                'title' => $data->name,
                'properties' => []
            ];
        }else{
            $dataDitra = $this->modelDataDitra->where('uuid', $uuid)->first();

            $data = [
                'title' => $dataDitra->type,
                'properties' => [
                    'Fecha de ocurrencia' => $dataDitra->occurrence_date,
                    'Seccional' => $dataDitra->sectional,
                    'Asignado' => $dataDitra->assigned,
                    'Intoxicación' => $dataDitra->intoxication,
                    'Responsabilidad' => $dataDitra->responsibility,
                    'Clase de vehículo' => $dataDitra->vehicle_class,
                    'Clase de servicio' => $dataDitra->service_class,
                    'Inspección' => $dataDitra->inspection,
                    'Tipo' => $dataDitra->type,
                    'Hipótesis' => $dataDitra->hypothesis,
                    'Posible ocurrencia' => $dataDitra->possible_occurrence,
                ]
            ];
        }

        return $data;
    }
}
