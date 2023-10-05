<?php

namespace App\Values;

use App\Strategies\StrategiesPoints\Villavicencio\StrategyCai;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyAlarms;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyCameras;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyEntities;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyPollingPlace;
use App\Strategies\StrategiesPoints\Villavicencio\StrategyFiberPoints;

use App\Strategies\StrategyLines\Villavicencio\StrategyFiberLines;

use App\Strategies\StrategyPolygons\Villavicencio\StrategyEvents;

use App\Strategies\StrategyMovementUnitis\StrategyMovementUnitis;


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
        8 => IncidentController::class,
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