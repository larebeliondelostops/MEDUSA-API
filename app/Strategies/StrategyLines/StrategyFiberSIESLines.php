<?php

namespace App\Strategies\StrategyLines;


use Exception;
use App\Models\FiberSiesLine;
use App\Strategies\LinesInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyFiberSIESLines implements LinesInterface
{
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $fiberLines = FiberSiesLine::all();

            $Lines = $fiberLines->map(function ($item) {

                $fiberLines = [
                    'type' => 'feature',
                    'markerType' => 1,
                    'id' => $item->uuid,
                    'title' => $item->name,
                    'geometry' => json_decode($item->position)
                ];

                return $fiberLines;
            });

            return Response::json($Lines, 200, [], JSON_PRETTY_PRINT);
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
