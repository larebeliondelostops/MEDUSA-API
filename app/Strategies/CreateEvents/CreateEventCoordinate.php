<?php

namespace App\Strategies\CreateEvents;

use App\Strategies\CreateEventInterface;
use App\Models\Event;
use App\Models\EventCoordinate;
use Illuminate\Support\Facades\Response;

/**
 * Clase que maneja toda la logica para la creacion de eventos con coordenadas
 *
 * 
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     Daniel Martinez <danielxz331@gmail.com>
 * @version    v1.0.0
 */

class CreateEventCoordinate implements CreateEventInterface
{

    //Metodo para crear un evento
    public function createEvent($request)
    {

            // Validación
            if (isset($request->validator) && $request->validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $event = new Event();

            $event->idEventType = $request->idEventType;
            $event->name = $request->name;
            $event->startDate = $request->startDate;
            $event->endDate = $request->endDate;
            $event->capacity = $request->capacity;
            $event->place = $request->place;
            $event->authorizingEntity = $request->authorizingEntity;

            $event->save();

            $pointCoordinate = $this->asingCoordinateEvent($request, $event->id);

            return response()->json([$event, $pointCoordinate], 200);
        
    }

    //Metodo para asignar las coordenadas a un evento
    public function asingCoordinateEvent($request, $eventId)
    {

        $pointCoordinate = new EventCoordinate();

        $pointCoordinate->eventId = $eventId;
        $pointCoordinate->pointCoordinates = json_encode($request->pointCoordinates);

        $pointCoordinate->save();

        return $pointCoordinate;
    }
}
