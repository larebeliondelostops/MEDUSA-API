<?php

namespace App\Contexts;

use App\Values\ReportsValuesDitra;
use App\Values\ReportsValuesVillavicencio;

class ReportsContext
{
    /**
     * variable para invocar la clase dependiendo la key
     *
     */
    const VALUE = [
        //'neiva' => AllDataValuesNeiva::class,
        'villavicencio' => ReportsValuesVillavicencio::class,
        'ditra' => ReportsValuesDitra::class,
    ];
}