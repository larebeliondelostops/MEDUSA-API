<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use App\Models\HeadquarterLasCeibasEPN;
use App\Strategies\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyHeadquartersLasCeibasEPN implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $Headquarters = HeadquarterLasCeibasEPN::all();

            $Headquarter = $Headquarters->map(function ($item) {

                $Headquarters = [
                    'markerType' => 8,
                    'id' => $item->uuid,
                    'geometry' => json_decode($item->position)
                ];

                return $Headquarters;
            });

            return Response::json($Headquarter, 200, [], JSON_PRETTY_PRINT);
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
            $Headquarters = HeadquarterLasCeibasEPN::where('uuid', $uuid)->first();

            $Headquarters = [
                'title' => $Headquarters->name,
                'properties' => []
            ];

            return Response::json($Headquarters, 200, [], JSON_PRETTY_PRINT);
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
