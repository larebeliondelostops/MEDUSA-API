<?php

namespace App\Values;

use App\Strategies\GetEvents\GetEventCoordinate;

final class EventGetValues
{
    const STRATEGY = [
        'EventCoordinate' => GetEventCoordinate::class,
    ];
}