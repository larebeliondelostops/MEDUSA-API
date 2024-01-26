<?php

namespace App\Contexts;

use App\Values\AllDataValuesNeiva;
use App\Values\AllDataValuesVillavicencio;

class AllDataContext
{
    /**
     * variable para invocar la clase dependiendo la key
     *
     */
    const VALUE = [
        'neiva' => AllDataValuesNeiva::class,
        'villavicencio' => AllDataValuesVillavicencio::class,
        'dev' => AllDataValuesVillavicencio::class,
    ];
}