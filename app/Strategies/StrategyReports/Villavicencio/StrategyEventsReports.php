<?php

namespace App\Strategies\StrategyReports\Villavicencio;

use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\CriminalActs;
use App\Models\EventType;
use App\Strategies\GetEvents\GetEventCoordinate;
use App\Strategies\Interface\ReportsInterface;

class StrategyEventsReports implements ReportsInterface
{
    private $type;

    public function getReportsData(Request $request)
    {
        $this->type = $request->type ?? null;
        if ($this->type != null) {
            $reportsData = [
                $this->tabsEvents(),
                $this->eventsByMonth(),
                $this->eventsByWeekDay(),
                $this->polygon()
            ];
        } else {
            $reportsData = [
                $this->tabsEvents(),
                $this->cardsEvents(),
                $this->eventsByMonth(),
                $this->eventsByTypeLastTDays(),
                $this->eventsByWeekDay(),
            ];
        }

        return response()->json(['reportsData' => $reportsData]);
    }

    public function tabsEvents()
    {
        $tabsEvents = Event::selectRaw('events.id_event_type, COUNT(*) as count')
            ->groupBy('events.id_event_type')
            ->orderBy('count', 'desc')
            ->get();

        $tiposDeEventos = EventType::all();

        foreach ($tiposDeEventos as $type) {
            if (!$tabsEvents->pluck('id_event_type')->contains($type->id)) {
                $tabsEvents->push((object) [
                    'id_event_type' => $type->id,
                    'count' => 0,
                    'eventType' => $type
                ]);
            }
        }

        $series = $tabsEvents
            ->map(function ($event) {
                return $event->count;
            });

        $labels = $tabsEvents
            ->map(function ($event) {
                return $event->eventType->eventName;
            });

        $key = $tabsEvents
            ->map(function ($event) {
            return $event->id_event_type;
        });

        $series = $series->prepend(Event::count());
        $labels = $labels->prepend('General');
        $key = $key->prepend(0);

        $data = [
            'title' => 'Eventos por tipo',
            'series' => $series,
            'labels' => $labels,
            'key' => $key,
            'type' => 'tabs'
        ];

        return $data;
    }

    public function cardsEvents()
    {
        $hoy = Carbon::now();

        $hace_30_dias = $hoy->copy()->subDays(30);

        $primerDiaDelMes = $hoy->copy()->firstOfMonth();

        $diasTranscurridos = $hoy->copy()->diffInDays($primerDiaDelMes);

        $cardsEvents = Event::selectRaw('id_event_type, COUNT(*) as count')
            ->whereBetween('created_at', [$hace_30_dias, $hoy])
            ->groupBy('id_event_type')
            ->orderBy('count', 'desc')
            ->take(3)
            ->get();

        $tipos = array_column($cardsEvents->toArray(), 'id_event_type');

        $cantidadDiaInicioToDiaActualAnterior = [];
        $cantidadDiaInicioToDiaActualActual = [];

        foreach($tipos as $tipo) {

            $cantidadDiaInicioToDiaActualAnterior[] = Event::with('eventType')->where('id_event_type', $tipo)->whereBetween('created_at', [$hace_30_dias->copy()->subDays($diasTranscurridos), $hace_30_dias->copy()->subDays(0)])->count();

            $cantidadDiaInicioToDiaActualActual[] = Event::with('eventType')->where('id_event_type', $tipo)->whereBetween('created_at', [$primerDiaDelMes, $hoy])->count();
        }

        $series = [];

        for ($i = 0; $i < $cardsEvents->count(); $i++) {
            $porcentaje = $cantidadDiaInicioToDiaActualAnterior[$i] == 0 ? $cantidadDiaInicioToDiaActualActual[$i] * 100 : (($cantidadDiaInicioToDiaActualActual[$i] - $cantidadDiaInicioToDiaActualAnterior[$i]) / $cantidadDiaInicioToDiaActualAnterior[$i]) * 100;

            $series[] = [
                'data' => $cardsEvents[$i]->count,
                'percent' => $porcentaje,
                'type' => $porcentaje < 0 ? 'red' : 'green'
            ];
        }

        $labels = $cardsEvents
            ->map(function ($incident) {
                return $incident->eventType->eventName;
            });

        $data = [
            'title' => 'Cards de eventos con sus respectivos porcentajes',
            'date' =>  $hace_30_dias->format('d/m/y') . ' - ' . Carbon::now()->format('d/m/y'),
            'series' => $series,
            'labels' => $labels,
            'type' => 'cards'
        ];

        return $data;
    }

    public function eventsByMonth()
    {
        if ($this->type != null){
            $eventosPorMes = Event::selectRaw('month, COUNT(*) as count')
                ->where('id_event_type', $this->type)
                ->where('year', date('Y'))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();
        } else {
            $eventosPorMes = Event::selectRaw('month, COUNT(*) as count')
                ->where('year', date('Y'))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();
        }

        $series = [];
        foreach (Helper::MONTH_NUMBER as $month) {
            if ($eventosPorMes->pluck('month')->contains($month)) {
                $series[] = $eventosPorMes->where('month', $month)->first()->count;
            } else {
                $series[] = 0;
            }
        }

        $data = [
            'title' => $this->type != null ? EventType::find($this->type)->eventName . ' por mes' : 'Eventos por mes',
            'date' =>  date('Y'),
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            'type' => 'area'
        ];

        return $data;
    }

    public function eventsByWeekDay()
    {
        if ($this->type != null){
            $eventos_por_tipo = Event::select('id_event_type')
                ->where('id_event_type', $this->type)
                ->groupBy('id_event_type')
                ->get();
        } else {
            $eventos_por_tipo = Event::select('id_event_type')
                ->groupBy('id_event_type')
                ->get();
        }

        $series = [];

        foreach ($eventos_por_tipo as $evento_por_tipo) {
            $eventos_por_dia = Event::where('id_event_type', $evento_por_tipo->id_event_type)
                ->selectRaw('day, COUNT(*) as count')
                ->groupBy('day')
                ->get();

            $data = [];
            foreach (Helper::DAY_NUMBER as $day) {
                if ($eventos_por_dia->pluck('day')->contains($day)) {
                    $data[] = $eventos_por_dia->where('day', $day)->first()->count;
                } else {
                    $data[] = 0;
                }
            }

            $series[] = [
                'name'  => $evento_por_tipo->eventType->eventName,
                'data' => $data
            ];

        }

        $data = [
            'title' => $this->type != null ? EventType::find($this->type)->Name . ' por día de la semana' : 'Incidentes por día de la semana',
            'date' =>  'Historico',
            'series' => $series,
            'labels' => Helper::DAY_NAME,
            'type' => 'column'
        ];

        return $data;
    }

    public function eventsByTypeLastTDays()
    {
        $hoy = Carbon::now();

        $hace_30_dias = $hoy->subDays(30);

        $eventos = Event::with('eventType')->whereDate('created_at', '>=', $hace_30_dias)->get();
        $tipos_usados = $eventos->pluck('id_event_type');

        $series = [];
        $labels = [];

        foreach (EventType::all() as $tipo_evento) {
            if ($tipos_usados->contains($tipo_evento->id)) {
                $series[] = $eventos->where('id_event_type', $tipo_evento->id)->count();
                $labels[] = $eventos->where('id_event_type', $tipo_evento->id)->first()->eventType->eventName;
            } else {
                $series[] = 0;
                $labels[] = $tipo_evento->eventName;
            }
        }

        $data = [
            'title' => 'Eventos por tipo últimos 30 días',
            'date' =>  $hace_30_dias->format('d/m/y') . ' - ' . Carbon::now()->format('d/m/y'),
            'series' => $series,
            'labels' => $labels,
            'type' => 'bar'
        ];

        return $data;
    }


    public function polygon()
    {
        $event = Event::where('id_event_type', $this->type)->first();

        $events = new GetEventCoordinate();

        return $events->getEvent($event->id);
    }

    /* public function EventsByAuthorizingEntity()
    {
        // Obtener todas las entidades autorizadoras disponibles en los eventos
        $entidadesAutorizadoras = Event::distinct('authorizingEntity')->pluck('authorizingEntity');

        $reporte = [];

        foreach ($entidadesAutorizadoras as $entidad) {
            // Obtener los eventos asociados a la entidad autorizadora
            $eventos = Event::where('authorizingEntity', $entidad)->get();

            // Obtener la cantidad de eventos para la entidad autorizadora
            $cantidadEventos = $eventos->count();

            // Agregar entidad autorizadora y cantidad de eventos al reporte
            $reporte[] = [
                'entidadAutorizadora' => $entidad,
                'eventCount' => $cantidadEventos,
            ];
        }

        return response()->json(['reporte' => $reporte]);
    }

    public function EventsByCapacityRange()
    {
        // Obtener el inicio del mes actual
        $inicioMesActual = Carbon::now()->startOfMonth();

        // Obtener el final del mes actual
        $finalMesActual = Carbon::now()->endOfMonth();

        $rangos = [
            ['min' => 0, 'max' => 100],
            ['min' => 101, 'max' => 500],
            ['min' => 501, 'max' => 1000],
            ['min' => 1001, 'max' => 2000],
            ['min' => 2001, 'max' => 4000],
            ['min' => 4001, 'max' => 6000],
            ['min' => 6001, 'max' => 8000],
            ['min' => 8001, 'max' => 10000],
        ];

        $reporte = [];

        foreach ($rangos as $rango) {
            // Obtener los eventos que se encuentren dentro del rango de capacidad y del mes actual
            $eventos = Event::whereBetween('capacity', [$rango['min'], $rango['max']])
                ->whereBetween('startDate', [$inicioMesActual, $finalMesActual])
                ->get();

            // Obtener la cantidad de eventos para el rango de capacidad
            $cantidadEventos = $eventos->count();

            // Agregar el rango de capacidad y cantidad de eventos al reporte
            $reporte[] = [
                'rangoCapacidad' => $rango['min'] . '-' . $rango['max'],
                'eventCount' => $cantidadEventos,
            ];
        }

        return response()->json(['reporte' => $reporte]);
    }


    public function EventsPastAndFuture()
    {
        // Obtener la fecha actual
        $fechaActual = Carbon::now();

        // Obtener los eventos pasados
        $eventosPasados = Event::where('startDate', '<', $fechaActual)->get();

        // Obtener los eventos futuros
        $eventosFuturos = Event::where('startDate', '>', $fechaActual)->get();

        $reporte = [
            'eventosPasados' => $eventosPasados->count(),
            'eventosFuturos' => $eventosFuturos->count(),
        ];

        return response()->json(['reporte' => $reporte]);
    }

    public function EventsByTypeAndAuthorizingEntity()
    {
        // Obtener todas las entidades autorizadoras disponibles en los eventos
        $entidadesAutorizadoras = Event::distinct('authorizingEntity')->pluck('authorizingEntity');

        $reporte = [];

        foreach ($entidadesAutorizadoras as $entidad) {
            // Obtener los eventos asociados a la entidad autorizadora con su tipo de evento
            $eventos = Event::join('eventsType', 'events.idEventType', '=', 'eventsType.id')
                ->where('events.authorizingEntity', $entidad)
                ->select('events.*', 'eventsType.eventName as eventName')
                ->get();

            // Obtener la cantidad de eventos por tipo de evento para la entidad autorizadora
            $eventosPorTipo = $eventos->groupBy('eventName')
                ->map(function ($events) {
                    return [
                        'eventName' => $events->first()->eventName,
                        'count' => $events->count(),
                    ];
                });

            // Agregar entidad autorizadora y eventos por tipo al reporte
            $reporte[] = [
                'entidadAutorizadora' => $entidad,
                'eventosPorTipo' => $eventosPorTipo,
            ];
        }

        return response()->json(['reporte' => $reporte]);
    } */
}
