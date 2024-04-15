<?php

namespace App\Interfaces\Markers;

use App\Interfaces\StrategyInterface;

interface LinesInterface extends StrategyInterface
{
    public function allLines();
}