<?php

namespace App\Strategies\GetEvents;

use App\Strategies\GetEventInterface;
use App\Models\Event;

/**
 * Clase que maneja toda la logica para la consulta de eventos con coordenadas
 *
 * 
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     Daniel Martinez <danielxz331@gmail.com>
 * @version    v1.0.0
 */

class GetEventCoordinate implements GetEventInterface
{
    //Metodo para traer todos los eventos
    public function getAllEvents()
    {

        $events = Event::with('eventType', 'eventCoordinate')->get();

        $eventsOrder = $this->OrderEvents($events);

        return $eventsOrder;
    }

    //Metodo para traer eventos por su tipo
    public function getEventsType($request)
    {

        $events = Event::where('idEventType', $request->idEventType)->with('eventType', 'eventCoordinate')->get();

        $eventsOrder = $this->OrderEvents($events);

        return $eventsOrder;
    }

    //Metodo para traer eventos por su fecha
    public function getEventsForDate($request)
    {

        $events = Event::where('startDate', '>=', $request->startDate)->where('endDate', '<=', $request->endDate)->with('eventType', 'eventCoordinate')->get();

        $eventsOrder = $this->OrderEvents($events);

        return $eventsOrder;
    }

    //Metodo para organizar en un mismo formato el retorno de la informacion de los eventos
    public function OrderEvents($events)
    {
        $eventosOrganizados = $events->map(function ($evento) {
            return [
                'properties' => [
                    'id' => $evento->uuid,
                    'markerType' => 55,
                    'idEventType' => $evento->idEventType,
                    'eventTypeName' => $evento['eventType']->eventName,
                    'name' => $evento->name,
                    'startDate' => $evento->startDate,
                    'endDate' => $evento->endDate,
                    'capacity' => $evento->capacity,
                    'place' => $evento->place,
                    'authorizingEntity' => $evento->authorizingEntity,
                ],
                'geometry' => $evento['eventCoordinate']->pointCoordinates
            ];
        });

        return response()->json($eventosOrganizados, 200);
    }
}
