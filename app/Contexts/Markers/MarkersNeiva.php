<?php

namespace App\Contexts\Markers;

use App\Http\Controllers\SettingsController;
use App\Strategies\StrategiesPoints\Neiva\StrategyAmbient;
use App\Strategies\StrategiesPoints\Neiva\StrategyFiberSIESPoints;
use App\Strategies\StrategiesPoints\Neiva\StrategyFiberCamerasPoints;
use App\Strategies\StrategiesPoints\Neiva\StrategySportVenues;
use App\Strategies\StrategiesPoints\Neiva\StrategyLighting;
use App\Strategies\StrategiesPoints\Neiva\StrategyMobility;
use App\Strategies\StrategiesPoints\Neiva\StrategyHealthCenters;
use App\Strategies\StrategiesPoints\Neiva\StrategyHeadquartersLasCeibasEPN;
use App\Strategies\StrategiesPoints\Neiva\StrategyPublicSafety;
use App\Strategies\StrategiesPoints\Neiva\StrategyDigitalZones;
use App\Strategies\StrategiesPoints\Neiva\StrategyEducationalCenters;
use App\Strategies\StrategyLines\Neiva\StrategyFiberSIESLines;
use App\Strategies\StrategyLines\Neiva\StrategyFiberCamerasLines;

class MarkersNeiva
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
        25 => SettingsController::class,
    ];

    const STRATEGY_LINES = [
        1 => StrategyFiberSIESLines::class,
        2 => StrategyFiberCamerasLines::class,
    ];

}
