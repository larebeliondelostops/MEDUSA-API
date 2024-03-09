<?php

namespace App\Values;

use App\Strategies\StrategyProbabilistic\Ditra\StrategyNAProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyChoqueProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyChoqueObjetoProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyVolcamientoLateralProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyVolcamientoProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategySalidaCalzadaProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyAtropelloProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyCaidaOcupanteProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyOtroProbabilistic;
use App\Strategies\StrategyProbabilistic\Ditra\StrategyAccidentsProbabilistic;

class ProbabilisticValuesDitra
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de reportes
     *
     */
    const STRATEGY = [
        // 1 => StrategyNAProbabilistic::class,
        // 2 => StrategyChoqueProbabilistic::class,
        // 3 => StrategyChoqueObjetoProbabilistic::class,
        // 4 => StrategyVolcamientoLateralProbabilistic::class,
        // 5 => StrategyVolcamientoProbabilistic::class,
        // 6 => StrategySalidaCalzadaProbabilistic::class,
        // 7 => StrategyAtropelloProbabilistic::class,
        // 8 => StrategyCaidaOcupanteProbabilistic::class,
        // 9 => StrategyOtroProbabilistic::class,
        1 => StrategyAccidentsProbabilistic::class,
    ];
}