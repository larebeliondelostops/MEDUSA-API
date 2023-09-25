<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\TrafficLight;
use App\Models\BusStop;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyMobility implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $BusStop = BusStop::all();

            $StopBus = $BusStop->map(function ($item) {

                $BusStop = [
                    'markerType' => 6,
                    'id' => $item->uuid,
                    'geometry' => json_decode($item->position),
                ];

                return $BusStop;
            });

            $TrafficLight = TrafficLight::all();

            $TrafficLights = $TrafficLight->map(function ($item) {

                $TrafficLight = [
                    'markerType' => 6,
                    'id' => $item->uuid,
                    'geometry' => json_decode($item->position),
                ];

                return $TrafficLight;
            });

            $Mobility = $StopBus->merge($TrafficLights);

            return Response::json($Mobility, 200, [], JSON_PRETTY_PRINT);
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
            $BusStop = BusStop::where('uuid', $uuid)->first();

            if (!$BusStop) {
                $TrafficLight = TrafficLight::where('uuid', $uuid)->first();

                $Mobility = [
                    'title' => $TrafficLight->name,
                    'properties' => [
                        'Estado' => $TrafficLight->status,
                    ],
                ];

                return Response::json($Mobility, 200, [], JSON_PRETTY_PRINT);
            } else {
                $Mobility = [
                    'title' => $BusStop->name,
                    'properties' => [
                        'ParaderosSETP' => $BusStop->paraderosSETP,
                    ]
                ];

                return Response::json($Mobility, 200, [], JSON_PRETTY_PRINT);
            }
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
