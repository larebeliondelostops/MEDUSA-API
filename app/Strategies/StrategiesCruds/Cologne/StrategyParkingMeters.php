<?php

namespace App\Strategies\StrategiesCruds\Cologne;

class StrategyParkingMeters extends StrategyGeodataTable
{
    protected function dataset(): string
    {
        return 'parking_ticket_machines';
    }

    protected function title(): string
    {
        return 'Parking meters';
    }
}
