<?php

namespace App\Contexts\Reports;

use App\Strategies\StrategyReports\Ditra\StrategyIncidentsReports;

class ReportsDitra
{
    /**
     * variable para invocar la clase dependiendo la key para el manejo de reportes
     *
     */
    const STRATEGY = [
        1 => StrategyIncidentsReports::class,
    ];
}