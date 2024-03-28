<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use App\Models\TrafficLights;
use App\Strategies\Interface\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyTrafficLights implements PointsInterface
{
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\JsonResponse
     */
    public static function all()
    {
        try {
            $traffic_lights = TrafficLights::all();

            $traffic_lights = $traffic_lights->map(function ($item) {

                $coordinates = explode(', ', $item->coordinates);

                $coordinates = array_map('floatval', $coordinates);

                $traffic_lights = [
                    'markerType' => 8,
                    'id' => $item->uuid,
                    'geometry' => [
                        'type' => "Point",
                        'coordinates' => $coordinates
                    ]
                ];

                return $traffic_lights;
            });

            return Response::json($traffic_lights, 200, [], JSON_PRETTY_PRINT);
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
            $traffic_lights = Trafficlights::where('uuid', $uuid)->first();

            $traffic_lights = [
                'title' => $traffic_lights->name,
                'properties' => [
                ]
            ];
            return Response::json($traffic_lights, 200, [], JSON_PRETTY_PRINT);
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
