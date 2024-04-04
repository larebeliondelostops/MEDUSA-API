<?php

namespace App\Strategies\StrategiesHeatmaps\Villavicencio;

use App\Models\Villavicencio\Ipats;
use App\Interfaces\Heatmaps\HeatmapActionsInterface;

class StrategyHeatMapIpats implements HeatmapActionsInterface
{
    public function __construct(
        private Ipats $model
    ) {}

    public function getModel() : Ipats
    {
        return $this->model;
    }

    public function getPoints()
    {
        return $this->getModel()->allPointsHeatMap();
    }
}
