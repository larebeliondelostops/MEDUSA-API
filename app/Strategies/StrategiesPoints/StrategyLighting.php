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
                    'type' => 'feature',
                    'markerType' => 3,
                    'title' => $item->name,
                    'geometry' => json_decode($item->position),
                    'properties' => [
                        'name' => $item->name,
                        'farola' => $item->farola,
                        'sticker' => $item->sticker,
                        'potencia' => $item->potencia,
                        'tecnologia' => $item->tecnologia,
                        'cuadrante' => $item->cuadrante,
                        'departamento' => $item->departamento,
                        'municipio' => $item->municipio,
                        'w' => $item->w,
                        'h' => $item->h,
                        'transformador' => $item->transformador,
                        'imagen' => $item->imagen,
                    ],
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
