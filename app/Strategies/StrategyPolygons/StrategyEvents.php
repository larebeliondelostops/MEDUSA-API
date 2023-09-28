<?php

namespace App\Strategies\StrategyPolygons;

use Exception;
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
            $events = Event::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);

            $transformedData = [];
            foreach ($events as $event) {
                $transformedData[] = [
                    'id' => $event->id,
                    'nombre' => $event->name,
                    'direccion' => $event->address,
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
            $event = Event::where('uuid', $id)->exists();

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
        $pointCoordinate->pointCoordinates = json_encode($request->pointCoordinates);

        $pointCoordinate->save();

        return $pointCoordinate;
    }

    public function update(Request $request, $id)
    {
        // TO DO
        try {
            //return $this->event->update($request, $id);
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
