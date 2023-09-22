<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\PublicSafety;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyPublicSafety implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $Safeties = PublicSafety::all();

            $Centers = $Safeties->map(function ($item) {

                $Safeties = [
                    'type' => 'feature',
                    'markerType' => 9,
                    'id' => $item->uuid,
                    'title' => $item->name,
                    'properties' => [
                        'Estado' => $item->state,
                    ],
                    'geometry' => json_decode($item->position)
                ];

                return $Safeties;
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

}
