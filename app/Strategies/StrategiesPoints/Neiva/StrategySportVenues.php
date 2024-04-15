<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\SportVenues;
use App\Interfaces\Markers\PointsInterface;

class StrategySportVenues implements PointsInterface
{
    public function __construct(
        private SportVenues $model
    ) {}

    public function getModel() : SportVenues
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public  function getInfoPoint($uuid)
    {
        $sportVenues = $this->getModel()->where('uuid', $uuid)->first();

        $sportVenues = [
            'title' => $sportVenues->name,
            'properties' => [
                'BARRIO' => $sportVenues->neighborhood,
                'ESCENARIO' => $sportVenues->scenery,
                'DIRECCION' => $sportVenues->address,
            ]
        ];

        return $sportVenues;
    }
}
