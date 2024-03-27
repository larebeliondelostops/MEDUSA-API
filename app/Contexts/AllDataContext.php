<?php

namespace App\Contexts;

use App\Values\AllDataValuesDitra;
use App\Values\AllDataValuesNeiva;
use App\Values\AllDataValuesVillavicencio;
use App\Values\AllDataValuesViper;

class AllDataContext
{
    /**
     * variable para invocar la clase dependiendo la key
     *
     */
    const VALUE = [
        'neiva' => AllDataValuesNeiva::class,
        'villavicencio' => AllDataValuesVillavicencio::class,
        'ditra' => AllDataValuesDitra::class,
        'viper' => AllDataValuesViper::class
    ];
}