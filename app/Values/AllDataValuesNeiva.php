<?php

namespace App\Values;

use App\Strategies\StrategiesPoints\StrategyAmbient;

class AllDataValuesNeiva
{
    /**
     * variable para invocar la clase dependiendo la key
     *
     */
    const STRATEGY = [
        1 => StrategyFiberSIES::class,
        2 => StrategyFiberCameras::class,
        3 => StrategyFiberSIES::class,
        4 => StrategyAmbient::class,
        5 => StrategyFiberSIES::class,
        6 => StrategyFiberSIES::class,
        7 => StrategyFiberSIES::class,
        8 => StrategyFiberSIES::class,
        9 => StrategyFiberSIES::class,
        10 => StrategyFiberSIES::class,
        11 => StrategyFiberSIES::class,
        50 => StrategyFiberSIES::class,
        51 => StrategyFiberSIES::class,
        52 => StrategyFiberSIES::class,
        53 => StrategyFiberSIES::class,
    ];
}