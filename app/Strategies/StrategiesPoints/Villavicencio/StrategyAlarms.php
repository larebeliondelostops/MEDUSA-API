<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use App\Models\Alarms;
use App\Interfaces\Markers\PointsInterface;

class StrategyAlarms implements PointsInterface
{
    public function __construct(
        private Alarms $model
    ) {}

    public function getModel() : Alarms
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->model->allPoints();
    }

    public function getInfoPoint($id)
    {
        $alarm = $this->model->where('uuid', $id)->first();

        $alarm = [
            'title' => $alarm->name,
            'properties' => [
                'id' => $alarm->uuid,
                'Direccion' => $alarm->address,
            ]
        ];

        return $alarm;
    }
}
