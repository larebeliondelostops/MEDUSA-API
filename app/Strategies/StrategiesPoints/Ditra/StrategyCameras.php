<?php

namespace App\Strategies\StrategiesPoints\Ditra;

use Exception;
use App\Models\Cameras;
use App\Strategies\Interface\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;



class StrategyCameras implements PointsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $cameras = Cameras::all();
            $transformedData = [];
            foreach ($cameras as $cameras) {
                $coordinates = json_decode($cameras->pointCoordinates, true);
                //$geometry = $coordinates['features'][0]['geometry'];
                $transformedData[] = [
                    'markerType' => 50,
                    'url' => $cameras->url,
                    'id' => $cameras->uuid,
                    'geometry' => $coordinates,
                ];
                
            }

            return Response::json($transformedData, 200, [], JSON_PRETTY_PRINT);
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
            $camera = Cameras::where('uuid', $uuid)->first();

            $camera = [
                'title' => $camera->name,
                'properties' => [
                    'Direccion' => $camera->address,
                    'Status'=> $camera->status
                ]
            ];

            return Response::json($camera, 200, [], JSON_PRETTY_PRINT);
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
