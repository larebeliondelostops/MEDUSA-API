<?php

namespace App\Values;

use App\Strategies\StrategiesProbabilistic\Villavicencio\StrategyProbabilisticCrimes;
use App\Strategies\StrategiesProbabilistic\Villavicencio\StrategyProbabilisticMovility;

class ProbabilisticValuesVillavicencio
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de reportes
     *
     */
    const STRATEGY = [
        51 => StrategyProbabilisticCrimes::class,
        57 => StrategyProbabilisticMovility::class,
    ];
}