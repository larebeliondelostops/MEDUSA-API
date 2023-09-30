<?php

namespace App\Strategies\StrategyPolygons;

use Exception;
use App\Clases\SaveGeoJson;
use App\Models\Event;
use \Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\EventCoordinate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Strategies\GetEvents\GetEventCoordinate;

class StrategyEvents
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $events = new GetEventCoordinate();
            return $events->getAllEvents();
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function allTable(Request $request)
    {
        try {
            // Obtener fechas de inicio y fin
            $start = $request->start;
            $end = $request->end;
            if ($start && $end) {
                //dd($start, $end);
                $events = Event::whereBetween('startDate', [$start, $end])
                    ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            } else {
                $events = Event::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
                
            }
            
            $transformedData = [];
            foreach ($events as $event) {
                $transformedData[] = [
                    'ID' => $event->id,
                    'Nombre' => $event->name,
                    'Lugar' => $event->place,
                ];
            }
            
            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'pagination' => [
                        'total' => $events->total(),
                        'perPage' => $events->perPage(),
                        'currentPage' => $events->currentPage(),
                        'lastPage' => $events->lastPage(),
                        'from' => $events->firstItem(),
                        'to' => $events->lastItem(),
                    ],
                    'filterDate' => true,
                ],
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function getOne($id)
    {
        try {
            $event = Event::find($id);

            if (!$event) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'El Evento No Existe'
                ], 404, [], JSON_PRETTY_PRINT);
            }
            $events = new GetEventCoordinate();
            return $events->getEvent($id);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
    public function store(Request $request)
    {
        try {
            //Validación
            if (isset($request->validator) && $request->validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }
            $event = new Event();
            $event->idEventType = $request->eventType;
            $event->name = $request->name;
            $event->startDate = $request->startDate;
            $event->endDate = $request->endDate;
            $event->capacity = $request->capacity;
            $event->place = $request->address;
            $event->authorizingEntity = $request->authorizingEntity;

            $event->save();

            $pointCoordinate = $this->asingCoordinateEvent($request, $event->id);

            return response()->json([$event, $pointCoordinate], 200);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    //Metodo para asignar las coordenadas a un evento
    public function asingCoordinateEvent($request, $eventId)
    {

        $pointCoordinate = new EventCoordinate();
        $pointCoordinate->eventId = $eventId;
        $pointCoordinate->pointCoordinates = json_encode($request->position);

        $pointCoordinate->save();

        return $pointCoordinate;
    }

    public function update(Request $request, $id)
    {
        try {

            $event = Event::find($id);

            $request->idEventType != null ? $event->idEventType = $request->idEventType : $event->idEventType = $event->idEventType;
            $request->name != null ? $event->name = $request->name : $event->name = $event->name;
            $request->startDate != null ? $event->startDate = $request->startDate : $event->startDate = $event->startDate;
            $request->endDate != null ? $event->endDate = $request->endDate : $event->endDate = $event->endDate;
            $request->capacity != null ? $event->capacity = $request->capacity : $event->capacity = $event->capacity;
            $request->address != null ? $event->place = $request->address : $event->place = $event->place;
            $request->authorizingEntity != null ? $event->authorizingEntity = $request->authorizingEntity : $event->authorizingEntity = $event->authorizingEntity;

            $event->save();

            if ($request->position != null) {
                $eventCoordinate = EventCoordinate::where('eventId', $event->id)->first();
                $eventCoordinate->pointCoordinates = $request->position;
                $eventCoordinate->save();
            }

            return Response::json([
                'status' => 'succes',
                'data' => $event
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function destroy($id)
    {
        try {
            EventCoordinate::where('eventId', $id)->delete();

            return Event::destroy($id);
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
http://villavicencio.localhost:81/api/v1/event/store
