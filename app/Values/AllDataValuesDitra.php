<?php

namespace App\Values;

use App\Strategies\StrategiesPoints\Ditra\StrategyIncidents;

class AllDataValuesDitra
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de puntos
     *
     */
    const STRATEGY = [
        8 => StrategyIncidents::class,
    ];

    /**
     * variable para invocar la clase dependiendo la key para el manejo de lineas
     *
     */
    const STRATEGY_LINES = [
    ];
}
