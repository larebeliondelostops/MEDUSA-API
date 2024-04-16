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
                'Nombre' => $lightings->name,
                'Poste' => $lightings->street_light,
                'Sticker' => $lightings->sticker,
                'Potencia' => $lightings->power,
                'Tecnología' => $lightings->technology,
                'Cuadrante' => $lightings->quadrant,
                'Departamento' => $lightings->department,
                'Municipio' => $lightings->municipality,
                'Ancho' => $lightings->width,
                'Alto' => $lightings->height,
                'Soporte' => $lightings->support,
                'Transformador' => $lightings->transformer,
                'Imagen' => $lightings->image,
                
            ]
        ];
        return $lightings;
    }
}
