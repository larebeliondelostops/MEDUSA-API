<?php

namespace App\Values;

use App\Strategies\CreateEvents\CreateEventCoordinate;

final class EventCreateValues
{
    const STRATEGY = [
        'EventCoordinate' => CreateEventCoordinate::class,
    ];
}