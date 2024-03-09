<?php

namespace App\Strategies\StrategiesMovementUnits;

use App\Models\TrafficLights;
use App\Interfaces\Markers\PointsInterface;

/**
 * Pendiente por ajustar
 */
class StrategyMovementUnits implements PointsInterface
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
        return Collect([]);
    }

    public function getInfoPoint($id)
    {
        $cai = $this->model->where('uuid', $id)->first();

        $cai = [
            'title' => $cai->name,
            'properties' => []
        ];

        return $cai;
    }

}
