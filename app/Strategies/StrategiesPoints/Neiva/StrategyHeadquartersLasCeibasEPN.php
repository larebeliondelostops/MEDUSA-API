<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\HeadquarterLasCeibasEPN;
use App\Interfaces\Markers\PointsInterface;

class StrategyHeadquartersLasCeibasEPN implements PointsInterface
{
    public function __construct(
        private HeadquarterLasCeibasEPN $model
    ) {}

    public function getModel() : HeadquarterLasCeibasEPN
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $headquarters = $this->getModel()->where('uuid', $uuid)->first();

        $headquarters = [
            'title' => $headquarters->name,
            'properties' => []
        ];

        return $headquarters;
    }

}
