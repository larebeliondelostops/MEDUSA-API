<?php

namespace App\Strategies\StrategiesCruds\Villavicencio;

use Exception;
use Carbon\Carbon;
use App\Clases\SaveGeoJson;
use App\Models\Villavicencio\Event;
use \Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Villavicencio\EventCoordinate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Strategies\GetEvents\GetEventCoordinate;
use App\Interfaces\Markers\PolygonsInterface;
use App\Strategies\StrategiesCruds\BaseCrud;

class StrategyEvents extends BaseCrud
{
    public function __construct(
        private Event $model
    ) {}

    public function getModel() : Event
    {
        return $this->model;
    }

    public function index($request)
    {
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

        $data = [
            'data' => $transformedData,
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
        ];

        return $data;
    }

    public function show($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return Response::json([
                'code' => '2001',
                'status' => 'error',
                'message' => 'El Evento No Existe'
            ], 404, [], JSON_PRETTY_PRINT);
        }
        $events = new GetEventCoordinate();
        //dd($events->getEvent($id));
        //dd(json_decode($events->getEvent($id)->getContent())->original);
        //dd(json_decode($events->getEvent($id)));
        //$event = $events->getEvent($id);
        
        return $events->getEvent($id)['data'];
    }
    public function store($request)
    {
        $event = new Event();
        $event->event_type_id = $request->event_type;
        $event->name = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->capacity = $request->capacity;
        $event->place = $request->address;
        $event->authorizing_entity = $request->authorizing_entity;
        $event->day = Carbon::now()->dayOfWeek;
        $event->month = date('m');
        $event->year = date('Y');
        $event->save();

        $pointCoordinate = $this->asingCoordinateEvent($request, $event->id);

        return response()->json([$event, $pointCoordinate], 200);
    }

    public function asingCoordinateEvent($request, $event_id)
    {

        $pointCoordinate = new EventCoordinate();
        $pointCoordinate->event_id = $event_id;
        $pointCoordinate->coordinates = json_encode($request->position);

        $pointCoordinate->save();

        return $pointCoordinate;
    }

    public function update($request, $id)
    {
        $event = Event::find($id);

        $request->event_type_id != null ? $event->idEventType = $request->idEventType : $event->idEventType = $event->idEventType;
        $request->name != null ? $event->name = $request->name : $event->name = $event->name;
        $request->start_date != null ? $event->startDate = $request->startDate : $event->startDate = $event->startDate;
        $request->end_date != null ? $event->endDate = $request->endDate : $event->endDate = $event->endDate;
        $request->capacity != null ? $event->capacity = $request->capacity : $event->capacity = $event->capacity;
        $request->address != null ? $event->place = $request->address : $event->place = $event->place;
        $request->authorizing_entity != null ? $event->authorizingEntity = $request->authorizingEntity : $event->authorizingEntity = $event->authorizingEntity;

        $event->save();

        if ($request->position != null) {
            $eventCoordinate = EventCoordinate::where('event_id', $event->id)->first();
            $eventCoordinate->coordinates = $request->position;
            $eventCoordinate->save();
        }

        return $event;
    }

    public function destroy($id)
    {
        EventCoordinate::where('event_id', $id)->delete();

        return Event::destroy($id);
    }
}
