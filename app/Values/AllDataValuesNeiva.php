<?php

namespace App\Values;

use App\Strategies\StrategiesPoints\StrategyAmbient;
use App\Strategies\StrategiesPoints\StrategyFiberSIESPoints;
use App\Strategies\StrategiesPoints\StrategyFiberCamerasPoints;
use App\Strategies\StrategiesPoints\StrategySportVenues;
use App\Strategies\StrategiesPoints\StrategyLighting;
use App\Strategies\StrategiesPoints\StrategyMobility;
use App\Strategies\StrategiesPoints\StrategyHealthCenters;
use App\Strategies\StrategiesPoints\StrategyHeadquartersLasCeibasEPN;
use App\Strategies\StrategiesPoints\StrategyPublicSafety;
use App\Strategies\StrategiesPoints\StrategyDigitalZones;
use App\Strategies\StrategiesPoints\StrategyEducationalCenters;
use App\Strategies\StrategyLines\StrategyFiberSIESLines;
use App\Strategies\StrategyLines\StrategyFiberCamerasLines;

class AllDataValuesNeiva
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de puntos
     *
     */
    const STRATEGY = [
        1 => StrategyFiberSIESPoints::class,
        2 => StrategyFiberCamerasPoints::class,
        3 => StrategyLighting::class,
        4 => StrategyAmbient::class,
        5 => StrategySportVenues::class,
        6 => StrategyMobility::class,
        7 => StrategyHealthCenters::class,
        8 => StrategyHeadquartersLasCeibasEPN::class,
        9 => StrategyPublicSafety::class,
        10 => StrategyDigitalZones::class,
        11 => StrategyEducationalCenters::class,
    ];

    const STRATEGY_LINES = [
        1 => StrategyFiberSIESLines::class,
        2 => StrategyFiberCamerasLines::class,
    ];

}
