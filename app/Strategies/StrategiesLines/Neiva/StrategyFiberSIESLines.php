<?php

namespace App\Strategies\StrategyLines\Neiva;

use App\Models\Neiva\FiberSiesLine;
use App\Interfaces\Markers\LinesInterface;

class StrategyFiberSIESLines implements LinesInterface
{
    public function __construct(
        private FiberSiesLine $model
    ) {}

    public function getModel() : FiberSiesLine
    {
        return $this->model;
    }

    public function allLines()
    {
        $fiberLines = $this->getModel()::all();

        $lines = $fiberLines->map(function ($item) {

            $fiberLines = [
                'type' => 'feature',
                'markerType' => 1,
                'id' => $item->uuid,
                'title' => $item->name,
                'geometry' => json_decode($item->position)
            ];

            return $fiberLines;
        });

        return $lines;
    }
}
