<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use App\Models\Villavicencio\FiberPoint;
use App\Interfaces\Markers\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyFiberPoints implements PointsInterface
{

    public function __construct(
        private FiberPoint $model
    ) {}

    public function getModel() : FiberPoint
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->model->allPoints();
    }

    public function getInfoPoint($id)
    {
        $fiberPoint = $this->model->where('uuid', $id)->first();

        $fiberPoint = [
            'title' => $fiberPoint->name,
            'properties' => []
        ];

        return $fiberPoint;
    }
}
