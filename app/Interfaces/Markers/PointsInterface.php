<?php

namespace App\Interfaces\Markers;

use App\Interfaces\StrategyInterface;

interface PointsInterface extends StrategyInterface
{
    public function allPoints();

    public function getInfoPoint($id);
}