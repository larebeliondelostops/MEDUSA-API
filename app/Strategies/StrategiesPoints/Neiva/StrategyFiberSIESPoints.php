<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\FiberSiesPoint;
use App\Interfaces\Markers\PointsInterface;

class StrategyFiberSIESPoints implements PointsInterface
{
    public function __construct(
        private FiberSiesPoint $model
    ) {}

    public function getModel() : FiberSiesPoint
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
