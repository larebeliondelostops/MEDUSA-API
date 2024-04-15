<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\DigitalZone;
use App\Interfaces\Markers\PointsInterface;

class StrategyDigitalZones implements PointsInterface
{
    public function __construct(
        private DigitalZone $model
    ) {}

    public function getModel() : DigitalZone
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $digitalZones = $this->getModel()->where('uuid', $uuid)->first();

        $digitalZones = [
            'title' => $digitalZones->name,
            'properties' => [
                'Tipo' => $digitalZones->type,
            ]
        ];

        return $digitalZones;
    }
}
