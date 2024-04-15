<?php

namespace App\Contexts\Reports;

use App\Contexts\Reports\ReportsDitra;
use App\Contexts\Reports\ReportsVillavicencio;

class ReportsContext
{
    /**
     * variable para invocar la clase dependiendo la key
     *
     */
    const VALUE = [
        //'neiva' => ReportsNeiva::class,
        'villavicencio' => ReportsVillavicencio::class,
        'ditra' => ReportsDitra::class,
    ];
}