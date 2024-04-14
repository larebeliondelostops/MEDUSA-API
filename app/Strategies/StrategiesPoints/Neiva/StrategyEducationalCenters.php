<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\EducationalCenter;
use App\Interfaces\Markers\PointsInterface;

class StrategyEducationalCenters implements PointsInterface
{
    public function __construct(
        private EducationalCenter $model
    ) {}

    public function getModel() : EducationalCenter
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $educationalCenters = $this->getModel()->where('uuid', $uuid)->first();

        $educationalCenters = [
            'title' => $educationalCenters->name,
            'properties' => []
        ];

        return $educationalCenters;
    }
}
