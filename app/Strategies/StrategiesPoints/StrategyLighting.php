<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\Lighting;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyLighting implements PointsInterface
{
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $Lightings = Lighting::all();

            $Lighting = $Lightings->map(function ($item) {

                $Lightings = [
                    'markerType' => 3,
                    'geometry' => json_decode($item->position),
                    'id' => $item->uuid,
                ];

                return $Lightings;
            });

            return Response::json($Lighting, 200, [], JSON_PRETTY_PRINT);
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
