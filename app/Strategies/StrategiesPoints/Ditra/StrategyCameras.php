<?php

namespace App\Strategies\StrategiesPoints\Ditra;

use App\Models\Ditra\Cameras;
use App\Interfaces\Markers\PointsInterface;

class StrategyCameras implements PointsInterface
{
    public function __construct(
        private Cameras $model
    ) {}

    public function getModel() : Cameras
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($id)
    {
        $camera = $this->getModel()->where('uuid', $id)->first();

        $camera = [
            'title' => $camera->name,
            'properties' => [
                'Direccion' => $camera->address
            ]
        ];

        return $camera;
    }
}
