<?php

namespace App\Strategies\StrategiesPoints\Ditra;

use App\Models\Ditra\DataDitra;
use App\Interfaces\Markers\PointsInterface;

class StrategyDataDitra implements PointsInterface
{
    public function __construct(
        private DataDitra $model
    ) {}

    public function getModel(): DataDitra
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $dataDitra = $this->getModel()->where('uuid', $uuid)->first();

        $dataDitra = [
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

        return $dataDitra;
    }
}
