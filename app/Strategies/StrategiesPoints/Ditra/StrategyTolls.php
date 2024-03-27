<?php

namespace App\Strategies\StrategiesPoints\Ditra;

use Exception;
use App\Models\Incident;
use App\Strategies\Interface\PointsInterface;
use Illuminate\Support\Facades\Log;
use App\Models\DataDitra;
use Illuminate\Support\Facades\Response;
use Psy\CodeCleaner\IssetPass;

class StrategyTolls implements PointsInterface
{
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            /* $incidents = Incident::all();
            $incidents = $incidents->map(function ($item) {

                $incident = [
                    'markerType' => 5,
                    'id' => $item->uuid,
                    'geometry' => json_decode($item->position),
                ];

                return $incident;
            });
            //dd($incidents);
            $datosDataDitra = StrategyDataDitra::all();
            //dd($datosDataDitra);
            if (!isset($incidents)) {
                $incidents = $incidents->merge($datosDataDitra);
            } else {
                $incidents = $datosDataDitra;
            } */
            //dd($incidents);
            return Response::json([], 200, [], JSON_PRETTY_PRINT);
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
            $data = Incident::where('uuid', $uuid)->first();
            if (isset($data)) {
                $data = [
                    'title' => $data->name,
                    'properties' => []
                ];
            }else{
                $data = StrategyDataDitra::getInfoPoint($uuid);
            }
            return Response::json($data, 200, [], JSON_PRETTY_PRINT);
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
