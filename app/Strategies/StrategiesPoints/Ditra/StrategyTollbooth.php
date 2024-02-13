<?php

namespace App\Strategies\StrategiesPoints\Ditra;

use Exception;
use App\Models\Tollbooth;
use App\Strategies\Interface\PointsInterface;
use Illuminate\Support\Facades\Log;
use App\Models\DataDitra;
use Illuminate\Support\Facades\Response;
use Psy\CodeCleaner\IssetPass;

class StrategyTollbooth implements PointsInterface
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
            $tollbooth = Tollbooth::all();
            $tollbooth = $tollbooth->map(function ($item) {

                $coordenadas = explode(',', $item->coordinates);

                // Convierte los valores en números
                $latitud = (float)$coordenadas[1];
                $longitud = (float)$coordenadas[0];

                $tollbooth = [
                    'markerType' => 2,
                    'id' => $item->uuid,
                    'geometry' => [
                        'type' => "Point",
                        'coordinates' => [$longitud, $latitud]
                    ]
                ];

                return $tollbooth;
            });

            return Response::json($tollbooth, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }


//        'uuid', 'id_peaje', 'name', 'state', 'project', 'electronic', 'cod_via', 'pr', 'department', 'municipality', 'coordinates'
    public static function getInfoPoint($uuid)
    {
        try {
            $data = tollbooth::where('uuid', $uuid)->first();

            $data = [
                'title' => $data->name,
                'properties' => [
                    'Id peaje' => $data->id_peaje,
                    'Estado' => $data->state,
                    'Proyecto' => $data->project,
                    'Electronico' => $data->electronic,
                    'Codigo via' => $data->cod_via,
                    'Pr' => $data->pr,
                    'Departamento' => $data->department,
                    'Municipio' => $data->municipality,
                    'Coordenadas' => $data->coordinates
                ]
            ];
        
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
