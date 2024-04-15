<?php

namespace App\Strategies\StrategiesPolygons\Villavicencio;

use Exception;
use App\Clases\SaveGeoJson;
use App\Models\Villavicencio\Event;
use \Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Villavicencio\EventCoordinate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Strategies\GetEvents\GetEventCoordinate;
use Carbon\Carbon;
use App\Interfaces\Markers\PolygonsInterface;

class StrategyEvents implements PolygonsInterface
{
    public function __construct(
        private Event $model
    ) {}

    public function getModel() : Event
    {
        return $this->model;
    }

    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public function allPolygons()
    {
        $events = new GetEventCoordinate();

        return $events->getAllEvents()->toArray();
    }

    public function allTable(Request $request)
    {
        try {
            $start = $request->start;
            $end = $request->end;
            if ($start && $end) {
                $events = Event::whereBetween('start_date', [$start, $end])
                    ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            } else {
                $events = Event::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
                
            }
            
            $transformedData = [];
            foreach ($events as $event) {
                $transformedData[] = [
                    'ID' => $event->id,
                    'Nombre' => $event->name,
                    'Direccion' => $event->place,
                    'Fecha' => $event->start_date,
                ];
            }
            
            return response()->json([
                'data' => $transformed_data,
                'meta' => [
                    'title' => 'Eventos',
                    'pagination' => [
                        'total' => $events->total(),
                        'perPage' => $events->perPage(),
                        'currentPage' => $events->currentPage(),
                        'lastPage' => $events->lastPage(),
                        'from' => $events->firstItem(),
                        'to' => $events->lastItem(),
                    ],
                    'filterDate' => true,
		            'ableCreate' => true
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
            if (isset($request->validator) && $request->validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }
            $event = new Event();
            $event->event_type_id = $request->eventType;
            $event->name = $request->name;
            $event->start_date = $request->startDate;
            $event->end_date = $request->endDate;
            $event->capacity = $request->capacity;
            $event->place = $request->address;
            $event->authorizing_entity = $request->authorizingEntity;
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

    public function asingCoordinateEvent($request, $eventId)
    {

        $pointCoordinate = new EventCoordinate();
        $pointCoordinate->event_id = $event_id;
        $pointCoordinate->coordinates = json_encode($request->position);

        $pointCoordinate->save();

        return $pointCoordinate;
    }

    public function update(Request $request, $id)
    {
        try {

            $event = Event::find($id);

            $request->event_type_id != null ? $event->id_event_type = $request->id_event_type : $event->id_event_type = $event->id_event_type;
            $request->name != null ? $event->name = $request->name : $event->name = $event->name;
            $request->start_date != null ? $event->start_date = $request->start_date : $event->start_date = $event->start_date;
            $request->end_date != null ? $event->end_date = $request->end_date : $event->end_date = $event->end_date;
            $request->capacity != null ? $event->capacity = $request->capacity : $event->capacity = $event->capacity;
            $request->address != null ? $event->place = $request->address : $event->place = $event->place;
            $request->authorizing_entity != null ? $event->authorizing_entity = $request->authorizing_entity : $event->authorizing_entity = $event->authorizing_entity;

            $event->save();

            if ($request->position != null) {
                $eventCoordinate = EventCoordinate::where('event_id', $event->id)->first();
                $eventCoordinate->coordinates = $request->position;
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
            EventCoordinate::where('event_id', $id)->delete();

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
