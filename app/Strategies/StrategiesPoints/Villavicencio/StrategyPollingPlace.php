<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Clases\SaveGeoJson;
use App\Models\Villavicencio\PollingPlace;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Interfaces\Markers\PointsInterface;
use App\Http\Request\pollingPlace\pollingPlaceRequest;

class StrategyPollingPlace implements PointsInterface
{
    public function __construct(
        private PollingPlace $model
    ) {}

    public function getModel() : PollingPlace
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($id)
    {
        $pollingPlace = $this->getModel()->where('uuid', $id)->first();

        $pollingPlace = [
            'title' => $pollingPlace->name,
            'properties' => [
                'Direccion' => $pollingPlace->address,
                'Potencial de mujeres' => $pollingPlace->potencialWomen,
                'Potencial de hombres' => $pollingPlace->potencialMen,
                'Total Votos' => $pollingPlace->totalVotes,
                'Mesas' => $pollingPlace->tables,
            ]
        ];

        return $pollingPlace;
    }
}
