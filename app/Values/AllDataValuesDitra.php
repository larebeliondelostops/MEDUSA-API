<?php

namespace App\Values;

use App\Strategies\StrategiesPoints\Ditra\StrategyIncidents;
use App\Strategies\StrategiesPoints\Ditra\StrategyTollbooth;
use App\Strategies\StrategyMovementUnitis\StrategyMovementUnitis;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyCameras;

class AllDataValuesDitra
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de puntos
     *
     */
    const STRATEGY = [
        1 => StrategyIncidents::class,
        2 => StrategyTollbooth::class,
        50 => StrategyCameras::class,
        54 => StrategyMovementUnitis::class,
    ];

    /**
     * variable para invocar la clase dependiendo la key para el manejo de lineas
     *
     */
    const STRATEGY_LINES = [
    ];
}
