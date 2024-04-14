<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\Ambient;
use App\Interfaces\Markers\PointsInterface;

class StrategyAmbient implements PointsInterface
{
    public function __construct(
        private Ambient $model
    ) {}

    public function getModel() : Ambient
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $ambient = $this->getModel()->where('uuid', $uuid)->first();

        $ambient = [
            'title' => $ambient->name,
            'properties' => [
                'Direccion' => $ambient->address,
            ]
        ];

        return $ambient;
    }
}
