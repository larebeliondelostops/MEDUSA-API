<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\HealthCenter;
use App\Interfaces\Markers\PointsInterface;

class StrategyHealthCenters implements PointsInterface
{
    public function __construct(
        private HealthCenter $model
    ) {}

    public function getModel() : HealthCenter
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $healthCenters = $this->getModel()->where('uuid', $uuid)->first();

        $healthCenters = [
            'title' => $healthCenters->name,
            'properties' => []
        ];

        return $healthCenters;
    }
}
