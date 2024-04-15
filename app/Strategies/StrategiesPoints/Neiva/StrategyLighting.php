<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use App\Models\Neiva\Lighting;
use App\Interfaces\Markers\PointsInterface;

class StrategyLighting implements PointsInterface
{
    public function __construct(
        private Lighting $model
    ) {}

    public function getModel() : Lighting
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->getModel()->allPoints();
    }

    public function getInfoPoint($uuid)
    {
        $lightings = $this->getModel()->where('uuid', $uuid)->first();

        $lightings = [
            'title' => $lightings->name,
            'properties' => [
                'name' => $lightings->name,
                'farola' => $lightings->farola,
                'sticker' => $lightings->sticker,
                'potencia' => $lightings->potencia,
                'tecnologia' => $lightings->tecnologia,
                'cuadrante' => $lightings->cuadrante,
                'departamento' => $lightings->departamento,
                'municipio' => $lightings->municipio,
                'w' => $lightings->w,
                'h' => $lightings->h,
                'transformador' => $lightings->transformador,
                'imagen' => $lightings->imagen,
            ]
        ];

        return $lightings;
    }
}
