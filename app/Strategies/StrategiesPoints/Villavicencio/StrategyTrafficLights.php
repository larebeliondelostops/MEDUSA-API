<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use App\Models\Villavicencio\TrafficLights;
use App\Interfaces\Markers\PointsInterface;

class StrategyTrafficLights implements PointsInterface
{
    public function __construct(
        private TrafficLights $model
    ) {}

    public function getModel() : TrafficLights
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($id)
    {
        $cai = $this->getModel()->where('uuid', $id)->first();

        $cai = [
            'title' => $cai->name,
            'properties' => [
                "Estado" => "FUNCIONAMIENTO NORMAL",
            ]
        ];

        if ($id == '27bce23d-ff10-4dc0-9f87-1f35e61dc3e7') {
            $cai = [
                'title' => "Anillo Vial Ojo de dios 1 ESTE-OESTE",
                'properties' => [
                    "direccion" => "Calle 1 Hyundai",
                    "excesos velocidad" => 9,
                    "humedad" => 0,
                    "infraccion semaforo rojo" => 2,
                    "peatones riesgo" => 0,
                    "velocidad promedio" => 38,
                    "fecha de registro" => "2024-06-26 19:00:21"
                ]
            ];
        }

        if ($id == 'dfde57d1-3ebc-4682-810a-1c4739d7b882') {
            $cai = [
                'title' => "Anillo Vial Ojo de dios 2 OESTE-ESTE",
                'properties' => [
                    "direccion" => "Calle 1 Chevrolet",
                    "excesos velocidad" => 46,
                    "humedad" => 0,
                    "infraccion semaforo_rojo" => 4,
                    "peatones riesgo" => 0,
                    "velocidad promedio" => 35,
                    "fecha de registro" => "2024-06-26 19:00:27"
                ]
            ];
        }

        return $cai;
    }
}
