<?php

namespace App\Interfaces\Heatmaps;

use App\Interfaces\StrategyInterface;

interface HeatmapActionsInterface extends StrategyInterface
{
    public function getPoints();
}