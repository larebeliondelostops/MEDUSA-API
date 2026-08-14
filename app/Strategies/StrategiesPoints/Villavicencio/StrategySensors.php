<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use App\Interfaces\Markers\PointsInterface;
use App\Models\Villavicencio\Sensor;

class StrategySensors implements PointsInterface
{
    public function __construct(
        private Sensor $model
    ) {}

    public function getModel() : Sensor
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($id)
    {
        $sensor = $this->getModel()->where('uuid', $id)->first();

    $sensor = [
        'title' => $sensor->name,
        'properties' => [
            'Nombre del Sensor' => $sensor->name,
            'Cantidad de Personas (última lectura)' => $sensor->people_count,
            'Fecha y hora de la última lectura' => $sensor->date_record,
            'Visitantes del día' => $sensor->daily_visitors,
            'Visitantes de la semana' => $sensor->weekly_visitors,
            'Visitantes totales' => $sensor->total_visitors,
            'Promedio diario de visitantes' => $sensor->daily_average
        ]
    ];


        return $sensor;
    }
}
