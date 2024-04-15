<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\FiberCameraPoint;
use App\Interfaces\Markers\PointsInterface;

class StrategyFiberCamerasPoints implements PointsInterface
{
    public function __construct(
        private FiberCameraPoint $model
    ) {}

    public function getModel() : FiberCameraPoint
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $fiberLines = $this->getModel()->where('uuid', $uuid)->first();

        $fiberLines = [
            'title' => $fiberLines->name,
            'properties' => []
        ];

        return $fiberLines;
    }
}
