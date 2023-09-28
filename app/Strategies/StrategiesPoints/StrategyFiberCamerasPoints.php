<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\FiberCameraPoint;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyFiberCamerasPoints implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $fiberLines = FiberCameraPoint::all();

            $Lines = $fiberLines->map(function ($item) {

                $fiberLines = [
                    'markerType' => 2,
                    'id' => $item->uuid,
                    'geometry' => json_decode($item->position)
                ];

                return $fiberLines;
            });

            return Response::json($Lines, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public static function getInfoPoint($uuid)
    {
        try {
            $fiberLines = FiberCameraPoint::where('uuid', $uuid)->first();

            $fiberLines = [
                'title' => $fiberLines->name,
                'properties' => []
            ];

            return Response::json($fiberLines, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

}
