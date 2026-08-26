<?php

namespace App\Strategies\StrategiesCruds\Cologne;

class StrategyTrafficLights extends StrategyGeodataTable
{
    protected function dataset(): string
    {
        return 'traffic_lights';
    }

    protected function title(): string
    {
        return 'Traffic lights';
    }
}
