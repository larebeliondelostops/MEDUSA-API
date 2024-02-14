<?php

namespace App\Strategies\StrategyMovementUnitis;

use Exception;
use App\Models\MobileDevice;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Strategies\Interface\MovementUnitisInterface;

class StrategyMovementUnitis implements MovementUnitisInterface
{
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try{
            $moviles = MobileDevice::where('is_active_position', true)->orderBy('id')->get();
            
            $transformedData = [];

            foreach ($moviles as $movil) {

                $coordenadas = explode(', ', $movil->position);

                $latitud = (float)$coordenadas[1];
                $longitud = (float)$coordenadas[0];

                $transformedData[] = [
                    'markerType' => 54,
                    'id' => $movil->id,
                    'geometry' => [
                        'type' => "Point",
                        'coordinates' => [$latitud, $longitud]
                    ],
                ];
            }

            return Response::json($transformedData, 200, [], JSON_PRETTY_PRINT);

        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

}
