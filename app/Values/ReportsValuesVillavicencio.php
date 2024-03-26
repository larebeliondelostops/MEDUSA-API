<?php

namespace App\Values;

use App\Strategies\StrategiesPoints\Villavicencio\StrategyIpats;
use App\Strategies\StrategyReports\Villavicencio\StrategyEventsReports;
use App\Strategies\StrategyReports\Villavicencio\StrategyIncidentsReports;
use App\Strategies\StrategyReports\Villavicencio\StrategyIpatsReports;
use App\Strategies\StrategyReports\Villavicencio\StrategyProbabilisticReports;

class ReportsValuesVillavicencio
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de reportes
     *
     */
    const STRATEGY = [
        /* 1 => StrategyAlarms::class,
        2 => StrategyCai::class,
        3 => StrategyEntities::class,
        4 => StrategyPollingPlace::class,
        5 => StrategyFiberPoints::class,
        5 => StrategyFiberPoints::class,
        8 => IncidentController::class,
        50 => StrategyCameras::class,
        54 => StrategyMovementUnitis::class, */
        8 => StrategyIncidentsReports::class,
        10 => StrategyIpatsReports::class,
        51 => StrategyProbabilisticReports::class,
        55 => StrategyEventsReports::class,
    ];
}