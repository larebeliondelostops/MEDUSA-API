<?php

namespace App\Strategies\CreateEvents;

use Exception;
use App\Strategies\CreateEventInterface;
use App\Models\Event;
use App\Models\EventCoordinate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class CreateEventCoordinate implements CreateEventInterface
{
    public function createEvent($request)
    {

        try {

            $request->validate([
                'idEventType' => 'required',
                'name' => 'required',
                'startDate' => 'required',
                'endDate' => 'required',
                'capacity' => 'required',
                'place' => 'required',
                'authorizingEntity' => 'required',
                'pointCoordinates' => 'required',
            ]);

            
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

        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);

        }
    }

    public function asingCoordinateEvent($request, $eventId)
    {

        $pointCoordinate = new EventCoordinate();

        $pointCoordinate->eventId = $eventId;
        $pointCoordinate->pointCoordinates = json_encode($request->pointCoordinates);

        $pointCoordinate->save();

        return $pointCoordinate;

    }
}
