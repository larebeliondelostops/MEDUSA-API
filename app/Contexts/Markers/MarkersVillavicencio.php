<?php

namespace App\Contexts\Markers;

use App\Http\Controllers\Viper\Strategies\StrategyProjectMarker;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyCai;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyAlarms;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyCameras;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyHealth;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyPollingPlace;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyFiberPoints;
use App\Strategies\StrategyLines\Villavicencio\StrategyFiberLines;
use App\Strategies\StrategyPolygons\Villavicencio\StrategyEvents;
use App\Strategies\StrategyMovementUnitis\StrategyMovementUnitis;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyIpats;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyTrafficLights;

class MarkersVillavicencio
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de puntos
     *
     */
    const STRATEGY = [
        1 => StrategyAlarms::class,
        2 => StrategyCai::class,
        3 => StrategyHealth::class,
        4 => StrategyPollingPlace::class,
        5 => StrategyFiberPoints::class,
        //6 => StrategyIncidents::class,
        7 => StrategyIpats::class,
        8 => StrategyTrafficLights::class,
        50 => StrategyCameras::class,
        54 => StrategyMovementUnitis::class,
        55 => StrategyEvents::class,
        // viper Strategies
        100 => StrategyProjectMarker::class,
    ];

    /**
     * variable para invocar la clase dependiendo la key para el manejo de lineas
     *
     */
    const STRATEGY_LINES = [
        5 => StrategyFiberLines::class,
    ];
}
