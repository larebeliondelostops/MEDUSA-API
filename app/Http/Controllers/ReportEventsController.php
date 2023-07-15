<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



/**
 * Controlador Maneja Lógica de Reportes.
 *
 * Controlador que maneja la lógica de reportes para el sistema.
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     David Acosta Ojeda <Dacostaojeda2000@gmail.com>
 * @version    v1.0.0
 */
class ReportEventsController extends Controller
{

    public function EventosMes()
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

    public function EventosPorTipo()
    {
        // Obtener el inicio del mes actual
        $inicioMesActual = Carbon::now()->startOfMonth();

        // Obtener el final del mes actual
        $finalMesActual = Carbon::now()->endOfMonth();

        // Consulta para obtener los eventos del mes actual con el tipo de evento
        $eventosytipos= Event::join('eventsType', 'events.idEventType', '=', 'eventsType.id')
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

    public function EventosPorEntidadAutorizadora()
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

    public function EventosPorRangoDeCapacidad()
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
    

    public function EventosPasadosYFuturos()
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

    public function EventosPorTipoYEntidadAutorizadora()
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
}
