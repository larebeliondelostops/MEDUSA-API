<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use App\Models\Villavicencio\TrafficLights;
use App\Interfaces\Markers\PointsInterface;

class StrategyTrafficLights implements PointsInterface
{
    public function __construct(
        private TrafficLights $model
    ) {}

    public function getModel() : TrafficLights
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($id)
    {
        $cai = $this->getModel()->where('uuid', $id)->first();

        $cai = [
            'title' => $cai->name,
            'properties' => []
        ];

        return $cai;
    }
}
