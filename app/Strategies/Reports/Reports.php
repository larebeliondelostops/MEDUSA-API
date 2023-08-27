<?php

namespace App\Strategies\Reports;

use App\Models\CriminalActs;
use Exception;
use App\Models\Event;
use App\Strategies\ReportsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;


class Reports implements ReportsInterface
{
    public function EventsForMonth()
    {
        // Obtener el inicio del mes actual
        $inicioMesActual = Carbon::now()->startOfMonth();

        // Obtener el final del mes actual
        $finalMesActual = Carbon::now()->endOfMonth();

        //consulta
        $eventosdelmes = Event::whereBetween('startDate', [$inicioMesActual, $finalMesActual])->get();

        // Obtener la cantidad total de eventos en el mes
        $totalEventos = $eventosdelmes->count();

        return response()->json(['eventCount' => $totalEventos]);
    }

    public function EventsForType()
    {
        // Obtener el inicio del mes actual
        $inicioMesActual = Carbon::now()->startOfMonth();

        // Obtener el final del mes actual
        $finalMesActual = Carbon::now()->endOfMonth();

        // Consulta para obtener los eventos del mes actual con el tipo de evento
        $eventosytipos = Event::join('eventsType', 'events.idEventType', '=', 'eventsType.id')
            ->whereBetween('events.startDate', [$inicioMesActual, $finalMesActual])
            ->select('events.*', 'eventsType.eventName as eventName')
            ->get();

        // Obtener la cantidad de eventos por tipo de evento
        $eventosPorTipo = $eventosytipos->groupBy('eventName')
            ->map(function ($events) {
                return [
                    'count' => $events->count(),
                ];
            });

        return response()->json(['eventCount' => $eventosPorTipo]);
    }

    public function EventsByAuthorizingEntity()
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
    }

    //reportes de actos delictivos

    public function StatisticsByIndicatorAndGrid(Request $request)
    {

        // Obtener la hora con más ocurrencias de delitos históricamente por indicador y cuadrícula
        $horaMasOcurrencias = CriminalActs::where('IndicatorId', '=', $request->indicatorId)
            ->where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('time')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('time')
            ->first();

        // Obtener el día de la semana con más ocurrencias de delitos históricamente por indicador y cuadrícula
        $diaSemanaMasOcurrencias = CriminalActs::where('IndicatorId', '=', $request->indicatorId)
            ->where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('day')
            ->first();

        // Definir todos los días de la semana
        $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

        // Obtener cantidad de delitos por día de la semana
        $delitosPorDiaSemana = CriminalActs::where('IndicatorId', '=', $request->indicatorId)
            ->where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->selectRaw('day, COUNT(*) as count')
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // Crear una colección para almacenar los resultados
        $porcentajePorDiaSemana = collect();

        // Iterar sobre todos los días de la semana
        foreach ($diasSemana as $dia) {
            $delitos = $delitosPorDiaSemana->firstWhere('day', $dia);

            $porcentaje = [
                'day' => $dia,
                'percentage' => $delitos ? ($delitos->count / $delitosPorDiaSemana->sum('count')) * 100 : 0,
            ];

            $porcentajePorDiaSemana->push($porcentaje);
        }

        return response()->json(['horaMasOcurrencias' => $horaMasOcurrencias, 'diaSemanaMasOcurrencias' => $diaSemanaMasOcurrencias, 'porcentajePorDiaSemana' => $porcentajePorDiaSemana]);
    }

    public function StatisticsGeneral(Request $request)
    {
        // Obtener la hora con más ocurrencias de delitos históricamente por cuadrícula general
        $horaMasOcurrencias = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('time')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('time')
            ->first();

        // Obtener el día de la semana con más ocurrencias de delitos históricamente por cuadrícula general
        $diaSemanaMasOcurrencias = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('day')
            ->first();

        // Obtener el delito más frecuente
        $delitoMasFrecuente = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('crime')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('crime')
            ->first();

        // Obtener el delito menos frecuente
        $delitoMenosFrecuente = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('crime')
            ->orderByRaw('COUNT(*) ASC')
            ->pluck('crime')
            ->first();

        // Obtener todos los días de la semana en mayúsculas
        $diasSemana = ["LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO", "DOMINGO"];

        // Obtener cantidad de delitos por día de la semana
        $delitosPorDiaSemana = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->selectRaw('day, COUNT(*) as count')
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // Crear una colección con todos los días de la semana y sus recuentos
        $porcentajePorDiaSemana = collect($diasSemana)->map(function ($dia) use ($delitosPorDiaSemana) {
            $delitos = $delitosPorDiaSemana->firstWhere('day', $dia);

            return [
                'day' => $dia,
                'percentage' => $delitos ? ($delitos->count / $delitosPorDiaSemana->sum('count')) * 100 : 0,
            ];
        });

        return response()->json(['horaMasOcurrencias' => $horaMasOcurrencias, 'diaSemanaMasOcurrencias' => $diaSemanaMasOcurrencias, 'delitoMasFrecuente' => $delitoMasFrecuente, 'delitoMenosFrecuente' => $delitoMenosFrecuente, 'porcentajePorDiaSemana' => $porcentajePorDiaSemana]);
    }
}
