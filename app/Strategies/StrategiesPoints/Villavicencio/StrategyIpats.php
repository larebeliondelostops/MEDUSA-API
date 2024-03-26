<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use App\Models\Ipats;
use App\Strategies\Interface\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyIpats implements PointsInterface
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
            $ipats = Ipats::all();
            $ipats = $ipats->map(function ($item) {

                $coordinates = explode(', ', $item->coordinates);

                $coordinates = array_map('floatval', $coordinates);

                $ipats = [
                    'markerType' => 7,
                    'id' => $item->uuid,
                    'geometry' => [
                        'type' => "Point",
                        'coordinates' => $coordinates
                    ]
                ];

                return $ipats;
            });

            return Response::json($ipats, 200, [], JSON_PRETTY_PRINT);
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
            $ipats = Ipats::where('uuid', $uuid)->first();

            $ipats = [
                'title' => $ipats->id_ipat,
                'properties' => [
                    'id_agente' => $ipats->id_agent,
                    'id_ipat' => $ipats->id_ipat,
                    'Lesionados' => $ipats->injured,
                    'Víctimas' => $ipats->victims,
                    //'Georeferencia' => $ipats->coordinates,
                    'Fecha de IPAT' => $ipats->date_ipat,
                ]
            ];
            return Response::json($ipats, 200, [], JSON_PRETTY_PRINT);
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
