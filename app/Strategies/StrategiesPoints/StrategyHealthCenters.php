<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\HealthCenter;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyHealthCenters implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $HealthCenters = HealthCenter::all();

            $Centers = $HealthCenters->map(function ($item) {

                $HealthCenters = [
                    'markerType' => 7,
                    'id' => $item->uuid,
                    'geometry' => json_decode($item->position)
                ];

                return $HealthCenters;
            });

            return Response::json($Centers, 200, [], JSON_PRETTY_PRINT);
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
            $HealthCenters = HealthCenter::where('uuid', $uuid)->first();

            $HealthCenters = [
                'title' => $HealthCenters->name,
                'properties' => []
            ];

            return Response::json($HealthCenters, 200, [], JSON_PRETTY_PRINT);
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
