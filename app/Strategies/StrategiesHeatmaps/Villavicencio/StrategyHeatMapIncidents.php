<?php

namespace App\Strategies\StrategiesHeatmaps\Villavicencio;

use App\Models\Villavicencio\CriminalActs;
use App\Interfaces\Heatmaps\HeatmapActionsInterface;

class StrategyHeatMapIncidents implements HeatmapActionsInterface
{
    public function __construct(
        private CriminalActs $model
    ) {}

    public function getModel() : CriminalActs
    {
        return $this->model;
    }

    public function getPoints()
    {
        return $this->getModel()->allPointsHeatMap();
    }
}
