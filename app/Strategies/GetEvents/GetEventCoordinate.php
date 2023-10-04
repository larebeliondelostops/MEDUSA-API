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

    // Metodo para trer un evento por su id
    public function getEvent($id)
    {
        $event = Event::where('id', $id)->with('eventType', 'eventCoordinate')->first();

        $eventsOrder = $this->OrderEventsOne($event);

        return $eventsOrder;
    }

    //Metodo para organizar en un mismo formato el retorno de la informacion de los eventos
    public function OrderEventsOne($events)
    {
        $eventosOrganizados = [ 'data' => [
            
                'eventType' => $events->idEventType,
                'address' => $events->place,
                'name' => $events->name,
                'startDate' => $events->startDate,
                'endDate' => $events->endDate,
                'capacity' => $events->capacity,
                'authorizingEntity' => $events->authorizingEntity,
                'position' => json_decode($events['eventCoordinate']->pointCoordinates)
            
        ]];

        return response()->json($eventosOrganizados, 200);
    }

    public function OrderEvents($events)
    {
        $eventosOrganizados = $events->map(function ($evento) {

            return [
                //'markerType' => 55,
                'properties' => [
                    'ID' => $evento->id,
                    'idEventType' => $evento->idEventType,
                    'eventTypeName' => $evento['eventType']->eventName,
                    'name' => $evento->name,
                    'startDate' => $evento->startDate,
                    'endDate' => $evento->endDate,
                    'capacity' => $evento->capacity,
                    'address' => $evento->place,
                    'authorizingEntity' => $evento->authorizingEntity,
                ],
                'position' => [
                    'type' => 'polygon',
                    'coordinates' => $evento['eventCoordinate']->pointCoordinates
                ]
            ];
        });

        return response()->json($eventosOrganizados, 200);
    }
}
