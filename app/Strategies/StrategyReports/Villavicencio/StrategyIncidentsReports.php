<?php

namespace App\Strategies\StrategyReports\Villavicencio;

use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrategyIncidentsReports
{
    private $incidents;
    private $inicio_mes_actual;
    private $final_mes_actual;

    public function __construct()
    {
        $this->incidents = Incident::class;
        $this->inicio_mes_actual = Carbon::now()->startOfMonth();
        $this->final_mes_actual = Carbon::now()->endOfMonth();
    }

    public function getReportsData(Request $request)
    {
        $reportsData = [
            'incidensByMonth' => $this->incidensByMonth(),
            //'incidensCountByMonth' => $this->incidensCountByMonth(),
            /* 'incidentsByType' => $this->incidentsByType($request),
            'incidentsCountByType' => $this->incidentsCountByType($request),
            'incidentsReviwed' => $this->incidentsReviwed(),
            'incidentsCountReviwed' => $this->incidentsCountReviwed(),
            'incidentsUnReviwed' => $this->incidentsUnReviwed(),
            'incidentsCountUnReviwed' => $this->incidentsCountUnReviwed(), */
        ];

        return response()->json(['reportsData' => $reportsData]);
    }

    public function incidensByMonth()
    {
        $incidentesPorMes = DB::table(DB::raw('(
            SELECT
                EXTRACT(YEAR FROM created_at) AS year,
                EXTRACT(MONTH FROM created_at) AS month,
                COUNT(*) AS count
            FROM incident
            GROUP BY year, month
            ) AS real_data'))
            ->rightJoin(DB::raw('(
                SELECT
                    generate_series(1, 12) AS month
            ) AS months'), function ($join) {
                $join->on('real_data.month', '=', 'months.month');
            })
            ->select(DB::raw('COALESCE(months.month, 0) AS month, COALESCE(count, 0) AS count'))
            ->orderBy('month')
            ->get();

        $series = $incidentesPorMes
            ->map(function ($incident) {
                return $incident->count;
            });

        $data = [
            'title' => 'Incidentes por mes',
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            'type' => 'bars'
        ];
        return $data;
    }

    /* public function incidensCountByMonth()
    {
        $incidentes_mes = $this->incidents->whereBetween('created_at', [$this->inicio_mes_actual, $this->final_mes_actual])->get();

        $total_incidentes = $incidentes_mes->count();

        return ['incidents' => $total_incidentes];
    } */

    /* public function incidentsByType(Request $request)
    {
        $incidentes_por_tipo = $this->incidents
            ->whereBetween('created_at', [$this->inicio_mes_actual, $this->final_mes_actual])
            ->where('indicator', $request->indicator)
            ->get();

        return ['incidents' => $incidentes_por_tipo];
    }

    public function incidentsCountByType(Request $request)
    {
        $incidents = $this->incidents
            ->whereBetween('created_at', [$this->inicio_mes_actual, $this->final_mes_actual])
            ->where('indicator', $request->indicator)
            ->selectRaw('indicator, COUNT(*) as count')
            ->groupBy('indicator')
            ->get();

        // Obtener la cantidad de eventos por tipo de evento
        $incidentes_por_tipo = $incidents
            ->map(function ($incident) {
                return [
                    'indicator' => $incident->indicator,
                    'count' => $incident->count,
                ];
            });

        return ['incidens' => $incidentes_por_tipo];
    }

    public function incidentsReviwed()
    {
        $incidens = $this->incidents->where('reviewed', true)->get();

        return ['incidens' => $incidens];
    }

    public function incidentsCountReviwed()
    {
        $incidens = $this->incidents->where('reviewed', true)->count();

        return ['incidens' => $incidens];
    }

    public function incidentsUnReviwed()
    {
        $incidens = $this->incidents->where('reviewed', false)->get();

        return ['incidens' => $incidens];
    }

    public function incidentsCountUnReviwed()
    {
        $incidens = $this->incidents->where('reviewed', false)->count();

        return ['incidens' => $incidens];
    } */


    /* public function EventsPastAndFuture()
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
    } */
}
