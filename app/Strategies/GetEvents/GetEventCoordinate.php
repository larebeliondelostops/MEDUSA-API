<?php

namespace App\Strategies\GetEvents;

use Exception;
use App\Strategies\GetEventInterface;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class GetEventCoordinate implements GetEventInterface
{
    public function getAllEvents()
    {

        try {

            $events = Event::with('eventType', 'eventCoordinate')->get();

            $eventsOrder = $this->OrderEvents($events);

            return $eventsOrder;

        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500);
        }
    }

    public function getEventsType($request)
    {
        try {

            $events = Event::where('idEventType', $request->idEventType)->with('eventType', 'eventCoordinate')->get();

            $eventsOrder = $this->OrderEvents($events);

            return $eventsOrder;

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
        try {

            $events = Event::where('startDate', '>=', $request->startDate)->where('endDate', '<=', $request->endDate)->with('eventType', 'eventCoordinate')->get();

            $eventsOrder = $this->OrderEvents($events);

            return $eventsOrder;
            
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500);
        }
    }

    public function OrderEvents($events)
    {
        $eventosOrganizados = $events->map(function ($evento) {
            return [
                'properties' => [
                    'id' => $evento->id,
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
