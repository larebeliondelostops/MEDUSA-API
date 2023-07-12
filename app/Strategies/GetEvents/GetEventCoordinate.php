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

            $eventos = Event::with('eventType','eventCoordinate')->get();

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

    public function getEventsType($request)
    {
        try {

            $events = Event::where('idEventType', $request->idEventType)->with('eventType','eventCoordinate')->get();

            return response()->json($events, 200);

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

            $events = Event::where('startDate', '>=', $request->startDate)->where('endDate', '<=', $request->endDate)->with('eventType','eventCoordinate')->get();

            return response()->json($events, 200);

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

