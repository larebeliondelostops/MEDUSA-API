<?php

namespace App\Values;

use App\Strategies\StrategiesProbabilistic\Ditra\StrategyNAProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategyChoqueProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategyChoqueObjetoProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategyVolcamientoLateralProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategyVolcamientoProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategySalidaCalzadaProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategyAtropelloProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategyCaidaOcupanteProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategyOtroProbabilistic;
use App\Strategies\StrategiesProbabilistic\Ditra\StrategyAccidentsProbabilistic;

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