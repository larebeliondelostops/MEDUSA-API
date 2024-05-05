<?php

namespace App\Strategies\StrategyReports\Villavicencio;

use Carbon\Carbon;
use App\Models\Villavicencio\Event;
use App\Helpers\Helper;
use App\Models\Villavicencio\EventType;
use Illuminate\Http\Request;
use App\Strategies\GetEvents\GetEventCoordinate;
use App\Interfaces\Reports\ReportActionsInterface;

class StrategyEventsReports implements ReportActionsInterface
{
    private $type;
    private $request;

    public function getCacheKeyReport(): string
    {
        return 'villavicencio_events_reports';
    }

    public function getReportsData(Request $request)
    {
        $this->request = $request;

        $general = [
            $this->cardsEvents(),
            $this->eventsByMonth(),
            $this->eventsByTypeLastTDays(),
            $this->eventsByWeekDay(),
            $this->EventsByCapacityRange()
        ];

        $generalData = [];

        array_push($generalData, $general);

        $types = Event::select('id_event_type')->groupBy('id_event_type')->get()->toArray();

        foreach ($types as $type) {
            $data = [];
            $this->type = $type['id_event_type'] ?? null;
            $data = [
                $this->eventsByMonth(),
                $this->eventsByWeekDay(),
                $this->polygon()
            ];
            array_push($generalData, $data);
        }

        $data = [
            'tabs' => $this->tabsEvents(),
            'reportsData' => $generalData
        ];

        return $data;
    }

    public function tabsEvents()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            $tabsEvents = Event::whereBetween('created_at', [$this->request->start, $this->request->end])
                ->selectRaw('events.id_event_type, COUNT(*) as count')
                ->groupBy('events.id_event_type')
                ->orderBy('count', 'desc')
                ->get();
        } else {
            $tabsEvents = Event::selectRaw('events.id_event_type, COUNT(*) as count')
                ->groupBy('events.id_event_type')
                ->orderBy('count', 'desc')
                ->get();
        }

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

        if (isset($this->request->start) && isset($this->request->end)) {
            $series = $series->prepend(Event::whereBetween('created_at', [$this->request->start, $this->request->end])->count());
        } else {
            $series = $series->prepend(Event::count());
        }

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

        $date = $hace_30_dias->format('d/m/y') . ' - ' . Carbon::now()->format('d/m/y');

        if (isset($this->request->start) && isset($this->request->end)) {
            $hoy = Carbon::parse($this->request->end);
            $hace_30_dias = Carbon::parse($this->request->start);
            $date = $hace_30_dias->format('d/m/y') . ' - ' . $hoy->format('d/m/y');
        }

        $primerDiaDelMes = $hoy->copy()->firstOfMonth();

        $diasTranscurridos = $hoy->copy()->diffInDays($primerDiaDelMes);

        $cardsEvents = Event::selectRaw('id_event_type, COUNT(*) as count')
            ->whereBetween('created_at', [$hace_30_dias, $hoy])
            ->groupBy('id_event_type')
            ->orderBy('count', 'desc')
            ->take(3)
            ->get();

        $cantidadEncontrados = count($cardsEvents);

        if ($cantidadEncontrados < 3) {

            $existingIndicators = $cardsEvents->pluck('id_event_type')->toArray();

            $cardsOthersEvents = Event::selectRaw('id_event_type, COUNT(*) as count')
                ->whereNotIn('id_event_type', $existingIndicators)
                ->groupBy('id_event_type')
                ->orderBy('count', 'desc')
                ->take(3 - $cantidadEncontrados)
                ->get();

            foreach ($cardsOthersEvents as $incident) {
                $incident->count = 0;
            }

            $cardsEvents = $cardsEvents->concat($cardsOthersEvents);
        }

        $tipos = array_column($cardsEvents->toArray(), 'id_event_type');

        $cantidadDiaInicioToDiaActualAnterior = [];
        $cantidadDiaInicioToDiaActualActual = [];

        if (isset($this->request->start) && isset($this->request->end)) {
            foreach($tipos as $tipo) {
                // $hoy es end y $hace_30_dias es start
                $primerDiaDelMes = $hoy->copy()->firstOfMonth();

                $diasTranscurridos = $hoy->copy()->diffInDays($hace_30_dias);

                $cantidadDiaInicioToDiaActualAnterior[] = Event::with('eventType')->where('id_event_type', $tipo)->whereBetween('created_at', [$hace_30_dias->copy()->subDays($diasTranscurridos), $hoy->copy()->subDays($diasTranscurridos)])->count();

                $cantidadDiaInicioToDiaActualActual[] = Event::with('eventType')->where('id_event_type', $tipo)->whereBetween('created_at', [$hace_30_dias, $hoy])->count();
            }
        } else {
            foreach($tipos as $tipo) {

                $cantidadDiaInicioToDiaActualAnterior[] = Event::with('eventType')->where('id_event_type', $tipo)->whereBetween('created_at', [$hace_30_dias->copy()->subDays($diasTranscurridos), $hace_30_dias->copy()->subDays(0)])->count();

                $cantidadDiaInicioToDiaActualActual[] = Event::with('eventType')->where('id_event_type', $tipo)->whereBetween('created_at', [$primerDiaDelMes, $hoy])->count();
            }
        }

        $series = [];

        for ($i = 0; $i < $cardsEvents->count(); $i++) {

            $porcentaje = $cantidadDiaInicioToDiaActualAnterior[$i] == 0 ? $cantidadDiaInicioToDiaActualActual[$i] * 100 : (($cantidadDiaInicioToDiaActualActual[$i] - $cantidadDiaInicioToDiaActualAnterior[$i]) / $cantidadDiaInicioToDiaActualAnterior[$i]) * 100;

            $porcentaje = $cantidadDiaInicioToDiaActualActual[$i] == 0 ? $cantidadDiaInicioToDiaActualAnterior[$i] * 100 : $porcentaje;

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
            'date' =>  $date,
            'series' => $series,
            'labels' => $labels,
            'type' => 'cards'
        ];

        return $data;
    }

    public function eventsByMonth()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            if ($this->type != null){
                $eventosPorMes = Event::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->selectRaw('month, COUNT(*) as count')
                    ->where('id_event_type', $this->type)
                    ->where('year', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
            } else {
                $eventosPorMes = Event::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->selectRaw('month, COUNT(*) as count')
                    ->where('year', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
            }
        } else {
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
        }

        $series = [];
        foreach (Helper::MONTH_NUMBER as $month) {
            if ($eventosPorMes->pluck('month')->contains($month)) {
                $series[] = $eventosPorMes->where('month', $month)->first()->count;
            } else {
                $series[] = 0;
            }
        }

        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = date('Y');
        }

        $data = [
            'title' => $this->type != null ? EventType::find($this->type)->eventName . ' por mes' : 'Eventos por mes',
            'date' =>  $date,
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            'type' => 'area'
        ];

        return $data;
    }

    public function eventsByWeekDay()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            if ($this->type != null){
                $eventos_por_tipo = Event::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->select('id_event_type')
                    ->where('id_event_type', $this->type)
                    ->groupBy('id_event_type')
                    ->get();
            } else {
                $eventos_por_tipo = Event::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->select('id_event_type')
                    ->groupBy('id_event_type')
                    ->get();
            }
        } else {
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
        }

        $series = [];

        foreach ($eventos_por_tipo as $evento_por_tipo) {
            if (isset($this->request->start) && isset($this->request->end)) {
                $eventos_por_dia = Event::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->where('id_event_type', $evento_por_tipo->id_event_type)
                    ->selectRaw('day, COUNT(*) as count')
                    ->groupBy('day')
                    ->get();
            } else {
                $eventos_por_dia = Event::where('id_event_type', $evento_por_tipo->id_event_type)
                    ->selectRaw('day, COUNT(*) as count')
                    ->groupBy('day')
                    ->get();
            }

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

        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => $this->type != null ? EventType::find($this->type)->Name . ' por día de la semana' : 'Incidentes por día de la semana',
            'date' =>  $date,
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

        $date = $hace_30_dias->format('d/m/y') . ' - ' . Carbon::now()->format('d/m/y');

        if (isset($this->request->start) && isset($this->request->end)) {
            $hoy = Carbon::parse($this->request->start);
            $hace_30_dias = Carbon::parse($this->request->end);
            $date = $hace_30_dias->format('d/m/y') . ' - ' . $hoy->format('d/m/y');
        }

        $eventos = Event::with('eventType')->whereDate('created_at', '>=', $hace_30_dias->toDateString())->get();
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
            'date' =>  $date,
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
    }*/

    public function EventsByCapacityRange()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            $inicioMesActual = Carbon::parse($this->request->start);
            $finalMesActual = Carbon::parse($this->request->end);
        } else {
            $inicioMesActual = Carbon::now()->startOfMonth();
            $finalMesActual = Carbon::now()->endOfMonth();
        }

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

        $series = [];
        $labels = [];

        foreach ($rangos as $rango) {
            // Obtener los eventos que se encuentren dentro del rango de capacidad y del mes actual
            $eventos = Event::whereBetween('capacity', [$rango['min'], $rango['max']])
                ->whereBetween('startDate', [$inicioMesActual, $finalMesActual])
                ->get();

            // Obtener la cantidad de eventos para el rango de capacidad
            $cantidadEventos = $eventos->count();

            // Agregar la cantidad de eventos a la serie
            $series[] = $cantidadEventos;
            $labels[] = 'Entre ' . $rango['min'] . '-' . $rango['max'];
        }

        $date = $inicioMesActual->format('d/m/y') . ' - ' .$finalMesActual->format('d/m/y');

        if (isset($this->request->start) && isset($this->request->end)) {
            $title = 'Eventos por capacidad desde ' . $inicioMesActual->format('d/m/y') . ' hasta ' . $finalMesActual->format('d/m/y');
        } else {
            $title = 'Eventos por capacidad del último mes';
        }

        $data = [
            'title' => $title,
            'date' =>  $date,
            'series' => $series,
            'labels' => $labels,
            'type' => 'pie'
        ];

        return $data;
    }
}
