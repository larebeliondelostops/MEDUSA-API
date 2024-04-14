<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\PublicSafety;
use App\Interfaces\Markers\PointsInterface;

class StrategyPublicSafety implements PointsInterface
{
    public function __construct(
        private PublicSafety $model
    ) {}

    public function getModel() : PublicSafety
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $safeties = $this->model->where('uuid', $uuid)->first();

        $safeties = [
            'title' => $safeties->name,
            'properties' => [
                'Estado' => $safeties->status,
            ]
        ];

        return $safeties;
    }
}
