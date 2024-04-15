<?php

namespace App\Strategies\StrategyLines\Neiva;

use App\Models\Neiva\FiberCameraLine;
use App\Interfaces\Markers\LinesInterface;

class StrategyFiberCamerasLines implements LinesInterface
{
    public function __construct(
        private FiberCameraLine $model
    ) {}

    public function getModel() : FiberCameraLine
    {
        return $this->model;
    }

    public function allLines()
    {
        $fiberLines = $this->getModel()::all();

        $Lines = $fiberLines->map(function ($item) {

            $fiberLines = [
                'type' => 'feature',
                'markerType' => 2,
                'id' => $item->uuid,
                'title' => $item->name,
                'geometry' => json_decode($item->position)
            ];

            return $fiberLines;
        });

        return $Lines;
    }
}
