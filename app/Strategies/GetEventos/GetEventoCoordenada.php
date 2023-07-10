<?php

namespace App\Strategies\GetEventos;

use Exception;
use App\Strategies\GetEventoInterface;
use App\Models\Evento;
use App\Models\CoordenadaEvento;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class GetEventoCoordenada implements GetEventoInterface
{
    public function getAllEvents()
    {
        try {

            $eventos = Evento::with('tipoEvento','coordenadaEvento')->get();

            return response()->json($eventos, 200);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500);
        }
    }

    public function getTipoEvents($request)
    {
        try {

            $eventos = Evento::where('id_tipo_evento', $request->id_tipo_evento)->with('tipoEvento','coordenadaEvento')->get();

            return response()->json($eventos, 200);

        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500);
        }
    }

    public function getEventsForDate($request)
    {
        try{

            $eventos = Evento::where('fecha_inicio', '>=', $request->fecha_inicio)->where('fecha_fin', '<=', $request->fecha_fin)->with('tipoEvento','coordenadaEvento')->get();

            return response()->json($eventos, 200);

        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500);
        }
    }
}

