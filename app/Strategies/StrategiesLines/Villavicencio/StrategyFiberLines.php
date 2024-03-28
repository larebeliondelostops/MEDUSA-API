<?php

namespace App\Strategies\StrategiesLines\Villavicencio;


use Exception;
use App\Models\Villavicencio\FiberLine;
use App\Interfaces\Markers\LinesInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyFiberLines implements LinesInterface
{
    public function __construct(
        private FiberLine $model
    ) {}

    public function getModel() : FiberLine
    {
        return $this->model;
    }

    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public function allLines()
    {
        $fiberLines = FiberLine::all();

        $Lines = $fiberLines->map(function ($item) {

            $fiberLines = [
                'type' => 'feature',
                'markerType' => 5,
                'id' => $item->uuid,
                'title' => $item->name,
                'geometry' => json_decode($item->coordinates)
            ];

            return $fiberLines;
        });

        return $Lines->toArray();
    }
}
