<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use App\Models\Ipats;
use App\Interfaces\Markers\PointsInterface;

class StrategyIpats implements PointsInterface
{
    public function __construct(
        private Ipats $model
    ) {}

    public function getModel() : Ipats
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->model->allPoints();
    }

    public function getInfoPoint($id)
    {
        $ipat = $this->model->where('uuid', $id)->first();

        $ipat = [
            'title' => $ipat->name,
            'properties' => [
                'id_agente' => $ipat->id_agent,
                'id_ipat' => $ipat->id_ipat,
                'Lesionados' => $ipat->injured,
                'Víctimas' => $ipat->victims,
                'Georeferencia' => $ipat->coordinates,
                'Fecha de IPAT' => $ipat->date_ipat,
            ]
        ];

        return $ipat;
    }
}
