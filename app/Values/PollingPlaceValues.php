<?php

namespace App\Values;

use App\Strategies\StrategyPollingPlace\StrategyPollingPlace;

final class PollingPlaceValues
{
    const STRATEGY = [
        'PollingPlace' => StrategyPollingPlace::class,
    ];
}