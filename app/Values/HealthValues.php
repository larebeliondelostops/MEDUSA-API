<?php

namespace App\Values;

use App\Strategies\StrategyHealth\StrategyHealth;

final class HealthValues
{
    const STRATEGY = [
        'Health' => StrategyHealth::class,
    ];
}