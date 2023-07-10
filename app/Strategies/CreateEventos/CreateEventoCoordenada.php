<?php

namespace App\Strategies\CreateEventos;

use Exception;
use App\Strategies\CreateEventoInterface;
use App\Models\Evento;
use App\Models\CoordenadaEvento;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class CreateEventoCoordenada implements CreateEventoInterface
{
    public function createEvent($request)
    {

        try {

            $request->validate([
                'id_tipo_evento' => 'required',
                'nombre' => 'required',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'hora_inicio' => 'required',
                'hora_fin' => 'required',
                'direccion' => 'required',
                'capacidad' => 'required',
                'estado' => 'required',
                'lugar' => 'required',
                'entidad_autorizante' => 'required',
                'coordenada_punto' => 'required',
            ]);

            $evento = new Evento();

            $evento->id_tipo_evento = $request->id_tipo_evento;
            $evento->nombre = $request->nombre;
            $evento->fecha_inicio = $request->fecha_inicio;
            $evento->fecha_fin = $request->fecha_fin;
            $evento->hora_inicio = $request->hora_inicio;
            $evento->hora_fin = $request->hora_fin;
            $evento->direccion = $request->direccion;
            $evento->capacidad = $request->capacidad;
            $evento->estado = $request->estado;
            $evento->lugar = $request->lugar;
            $evento->entidad_autorizante = $request->entidad_autorizante;

            $evento->save();

            $CoordenadaEvento = $this->asingCoordenadaEvent($request, $evento->id);

            return response()->json([$evento, $CoordenadaEvento], 200);

        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);

        }
    }

    public function asingCoordenadaEvent($request, $id_evento)
    {

        $CoordenadaEvento = new CoordenadaEvento();

        $CoordenadaEvento->id_evento = $id_evento;
        $CoordenadaEvento->coordenada_punto = json_encode($request->coordenada_punto);

        $CoordenadaEvento->save();

        return $CoordenadaEvento;

    }
}
