<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\EducationalCenter;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyEducationalCenters implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $EducationalCenters = EducationalCenter::all();

            $Centers = $EducationalCenters->map(function ($item) {

                $EducationalCenters = [
                    'markerType' => 11,
                    'id' => $item->uuid,
                    'geometry' => json_decode($item->position)
                ];

                return $EducationalCenters;
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
            $EducationalCenters = EducationalCenter::where('uuid', $uuid)->first();

            $EducationalCenters = [
                'title' => $EducationalCenters->name,
            ];

            return Response::json($EducationalCenters, 200, [], JSON_PRETTY_PRINT);
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
