<?php

namespace App\Values;

use App\Strategies\StrategyCai\StrategyCai;
use App\Strategies\GetEvents\GetEventCoordinate;
use App\Strategies\StrategyAlarms\StrategyAlarms;
use App\Strategies\StrategyCameras\StrategyCameras;
use App\Strategies\StrategyEntities\StrategyEntities;
use App\Strategies\StrategyPollingPlace\StrategyPollingPlace;
use App\Strategies\StrategyMovementUnitis\StrategyMovementUnitis;

class AllDataValuesVillavicencio
{
    /**
     * variable para invocar la clase dependiendo la key
     *
     */
    const STRATEGY = [
        1 => StrategyAlarms::class,
        2 => StrategyCai::class,
        3 => StrategyEntities::class,
        4 => StrategyPollingPlace::class,
        50 => StrategyCameras::class,
        54 => StrategyMovementUnitis::class,
        55 => GetEventCoordinate::class,
    ];
}