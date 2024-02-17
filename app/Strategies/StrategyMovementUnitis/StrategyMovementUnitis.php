<?php

namespace App\Strategies\StrategyMovementUnitis;

use Exception;
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
            /* $rutaArchivo = public_path('js/GeoJson/movement-entities.json');
            $contenidoArchivo = File::get($rutaArchivo);
            $contenido = json_decode($contenidoArchivo, true);

            return Response::json($contenido['features'], 200, [], JSON_PRETTY_PRINT); */
            return Response::json([], 200, [], JSON_PRETTY_PRINT);
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
