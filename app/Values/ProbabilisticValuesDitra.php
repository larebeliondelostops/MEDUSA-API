<?php

namespace App\Values;

use App\Strategies\StrategyProbabilistic\Ditra\StrategyNAProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyChoqueProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyChoqueObjetoProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyVolcamientoProbabilistic;

class ProbabilisticValuesDitra
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de reportes
     *
     */
    const STRATEGY = [
        1 => StrategyNAProbabilistic::class,
        2 => StrategyChoqueProbabilistic::class,
        3 => StrategyChoqueObjetoProbabilistic::class,
        4 => StrategyVolcamientoProbabilistic::class
    ];
}