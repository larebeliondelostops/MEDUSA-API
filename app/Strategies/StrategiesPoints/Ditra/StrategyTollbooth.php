<?php

namespace App\Strategies\StrategiesPoints\Ditra;

use App\Models\Ditra\Tollbooth;
use App\Interfaces\Markers\PointsInterface;

class StrategyTollbooth implements PointsInterface
{
    public function __construct(
        private Tollbooth $model
    ) {}

    public function getModel() : Tollbooth
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $tollbooth = $this->getModel()->where('uuid', $uuid)->first();

        $tollbooth = [
            'title' => $tollbooth->name,
            'properties' => [
                'Id peaje' => $tollbooth->id_peaje,
                'Estado' => $tollbooth->state,
                'Proyecto' => $tollbooth->project,
                'Electronico' => $tollbooth->electronic,
                'Codigo via' => $tollbooth->cod_via,
                'Pr' => $tollbooth->pr,
                'Departamento' => $tollbooth->department,
                'Municipio' => $tollbooth->municipality,
                'Coordenadas' => $tollbooth->coordinates
            ]
        ];

        return $tollbooth;
    }
}
