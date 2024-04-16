<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\BusStop;
use App\Models\Neiva\TrafficLight;
use App\Interfaces\Markers\PointsInterface;

class StrategyMobility implements PointsInterface
{
    public function __construct(
        private BusStop $modelBusStop,
        private TrafficLight $modelTraffic
    ) {}

    public function getModel() : BusStop
    {
        return $this->modelBusStop;
    }

    public function allPoints()
    {
        $busStop = $this->getModel()->allPoints();

        $trafficLight = $this->modelTraffic->allPoints();

        $mobility = $busStop->merge($trafficLight);

        return $mobility;
    }

    public function getInfoPoint($uuid)
    {
        $busStop = $this->getModel()->where('uuid', $uuid)->first();

        if (!$busStop) {
            $TrafficLight = $this->modelTraffic->where('uuid', $uuid)->first();

            $mobility = [
                'title' => $TrafficLight->name,
                'properties' => [
                    'Estado' => $TrafficLight->status,
                ],
            ];

            return $mobility;
        } else {
            $mobility = [
                'title' => $busStop->name,
                'properties' => [
                    'ParaderosSETP' => $busStop->bus_stop_setp,
                ]
            ];

            return $mobility;
        }
    }
}
