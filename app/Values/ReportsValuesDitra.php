<?php

namespace App\Values;

use App\Strategies\StrategyReports\Ditra\StrategyIncidentsReports;

class ReportsValuesDitra
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de reportes
     *
     */
    const STRATEGY = [
        1 => StrategyIncidentsReports::class,
    ];
}