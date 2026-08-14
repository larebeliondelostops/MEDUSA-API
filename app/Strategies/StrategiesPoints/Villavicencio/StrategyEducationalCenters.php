<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use App\Interfaces\Markers\PointsInterface;
use App\Models\Villavicencio\EducationalCenters;
use Illuminate\Support\Facades\Log;

class StrategyEducationalCenters implements PointsInterface
{
    public function __construct(
        private EducationalCenters $model
    ) {}

    public function getModel() : EducationalCenters
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
            'properties' => [
                'Secretaria' => $educationalCenters->secretary,
                'Sede' => $educationalCenters->headquarters,
                'Sector' => $educationalCenters->sector,
                'Zona' => $educationalCenters->zone,
                'Dirección' => $educationalCenters->address,
                'Teléfono' => $educationalCenters->phone,
            ]
        ];

        return $educationalCenters;
    }
}

