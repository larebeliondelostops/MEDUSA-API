<?php

namespace App\Strategies\GetEvents;

use Carbon\Carbon;
use App\Strategies\Interface\GetEventInterface;
use App\Models\Villavicencio\Event;

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
    public function getAllEvents()
    {

        $events = Event::with('eventType', 'eventCoordinate')->where('end_date', '>=', Carbon::now())->get();

        $eventsOrder = $this->OrderEvents($events);

        return $eventsOrder;
    }

    public function getEventsType($request)
    {

        $events = Event::where('event_type_id', $request->idEventType)->with('eventType', 'eventCoordinate')->get();

        $eventsOrder = $this->OrderEvents($events);

        return response()->json($eventsOrder, 200);
    }

    public function getEventsForDate($request)
    {

        $events = Event::where('start_date', '>=', $request->startDate)->where('end_date', '<=', $request->endDate)->with('eventType', 'eventCoordinate')->get();

        $eventsOrder = $this->OrderEvents($events);

        return response()->json($eventsOrder, 200);
    }

    public function getEvent($id)
    {
        $event = Event::where('id', $id)->with('eventType', 'eventCoordinate')->first();

        $eventsOrder = $this->OrderEventsOne($event);

        return $eventsOrder;
    }

    public function OrderEventsOne($events)
    {
        $eventosOrganizados = [ 'data' => [
            
                'event_type' => $events->event_type_id,
                'address' => $events->place,
                'name' => $events->name,
                'start_date' => $events->start_date,
                'end_date' => $events->end_date,
                'capacity' => $events->capacity,
                'authorizing_entity' => $events->authorizing_entity,
                'position' => json_decode($events['eventCoordinate']->coordinates)
            
        ]];

        return $eventosOrganizados;
    }

    public function OrderEvents($events)
    {
        $eventosOrganizados = $events->map(function ($evento) {

            return [
                'markerType' => 55,
                'properties' => [
                    'ID' => $evento->id,
                    'idEventType' => $evento->event_type_id,
                    'eventTypeName' => $evento['eventType']->event_name,
                    'name' => $evento->name,
                    'startDate' => $evento->start_date,
                    'endDate' => $evento->end_date,
                    'capacity' => $evento->capacity,
                    'address' => $evento->place,
                    'authorizingEntity' => $evento->authorizing_entity,
                ],
                'position' => json_decode($evento['eventCoordinate']->coordinates)

            ];
        });

        return $eventosOrganizados;
    }
}
