<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\DigitalZone;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyDigitalZones implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $DigitalZones = DigitalZone::all();

            $Zones = $DigitalZones->map(function ($item) {

                $DigitalZones = [
                    'type' => 'feature',
                    'markerType' => 10,
                    'id' => $item->uuid,
                    'title' => $item->name,
                    'properties' => [
                        'Tipo' => $item->type,
                    ],
                    'geometry' => json_decode($item->position)
                ];

                return $DigitalZones;
            });

            return Response::json($Zones, 200, [], JSON_PRETTY_PRINT);
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
