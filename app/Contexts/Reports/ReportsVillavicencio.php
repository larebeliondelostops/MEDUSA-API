<?php

namespace App\Contexts\Reports;

use App\Strategies\StrategyReports\Villavicencio\StrategyEventsReports;
use App\Strategies\StrategyReports\Villavicencio\StrategyIncidentsReports;
use App\Strategies\StrategyReports\Villavicencio\StrategyIpatsReports;
use App\Strategies\StrategyReports\Villavicencio\StrategyProbabilisticReports;

class ReportsVillavicencio
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de reportes
     *
     */
    const STRATEGY = [
        8 => StrategyIncidentsReports::class,
        10 => StrategyIpatsReports::class,
        51 => StrategyProbabilisticReports::class,
        55 => StrategyEventsReports::class,
    ];
}