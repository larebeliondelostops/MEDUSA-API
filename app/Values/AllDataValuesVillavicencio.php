<?php

namespace App\Values;

use App\Strategies\StrategyCai\StrategyCai;
use App\Strategies\GetEvents\GetEventCoordinate;
use App\Strategies\StrategyAlarms\StrategyAlarms;
use App\Strategies\StrategyCameras\StrategyCameras;
use App\Strategies\StrategyLines\StrategyFiberLines;
use App\Strategies\StrategyEntities\StrategyEntities;
use App\Strategies\StrategiesPoints\StrategyFiberPoints;
use App\Strategies\StrategyPollingPlace\StrategyPollingPlace;
use App\Strategies\StrategyMovementUnitis\StrategyMovementUnitis;
use App\Strategies\StrategyPolygons\StrategyEvents;

class AllDataValuesVillavicencio
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de puntos
     *
     */
    const STRATEGY = [
        1 => StrategyAlarms::class,
        2 => StrategyCai::class,
        3 => StrategyEntities::class,
        4 => StrategyPollingPlace::class,
        5 => StrategyFiberPoints::class,
        50 => StrategyCameras::class,
        54 => StrategyMovementUnitis::class,
        55 => StrategyEvents::class,
    ];

    /**
     * variable para invocar la clase dependiendo la key para el manejo de lineas
     *
     */
    const STRATEGY_LINES = [
        5 => StrategyFiberLines::class,
    ];
}