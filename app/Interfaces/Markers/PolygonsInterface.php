<?php

namespace App\Interfaces\Markers;

use App\Interfaces\StrategyInterface;

interface PolygonsInterface extends StrategyInterface
{
    public function allPolygons();
}