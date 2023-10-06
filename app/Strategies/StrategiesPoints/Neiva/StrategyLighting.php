<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use Exception;
use App\Models\Lighting;
use App\Strategies\Interface\PointsInterface;
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

    public static function getInfoPoint($uuid)
    {
        try {
            $Lightings = Lighting::where('uuid', $uuid)->first();

            $Lightings = [
                'title' => $Lightings->name,
                'properties' => [
                    'name' => $Lightings->name,
                    'farola' => $Lightings->farola,
                    'sticker' => $Lightings->sticker,
                    'potencia' => $Lightings->potencia,
                    'tecnologia' => $Lightings->tecnologia,
                    'cuadrante' => $Lightings->cuadrante,
                    'departamento' => $Lightings->departamento,
                    'municipio' => $Lightings->municipio,
                    'w' => $Lightings->w,
                    'h' => $Lightings->h,
                    'transformador' => $Lightings->transformador,
                    'imagen' => $Lightings->imagen,
                ]
            ];

            return Response::json($Lightings, 200, [], JSON_PRETTY_PRINT);
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
