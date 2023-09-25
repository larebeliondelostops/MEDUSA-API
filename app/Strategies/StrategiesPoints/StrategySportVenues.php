<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\SportVenues;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategySportVenues implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $SportVenues = SportVenues::all();

            $SportVenue = $SportVenues->map(function ($item) {

                $SportVenues = [
                    'markerType' => 5,
                    'id' => $item->uuid,
                    'geometry' => json_decode($item->position),
                ];

                return $SportVenues;
            });

            return Response::json($SportVenue, 200, [], JSON_PRETTY_PRINT);
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
            $SportVenues = SportVenues::where('uuid', $uuid)->first();

            $SportVenues = [
                'title' => $SportVenues->name,
                'properties' => [
                    'BARRIO' => $SportVenues->neighborhood,
                    'ESCENARIO' => $SportVenues->scenery,
                    'DIRECCION' => $SportVenues->address,
                ]
            ];

            return Response::json($SportVenues, 200, [], JSON_PRETTY_PRINT);
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
