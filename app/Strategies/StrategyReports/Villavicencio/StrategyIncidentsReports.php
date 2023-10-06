<?php

namespace App\Strategies\StrategyReports\Villavicencio;

use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Incident;
use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrategyIncidentsReports
{
    private $inicio_mes_actual;
    private $final_mes_actual;

    public function __construct()
    {
        $this->inicio_mes_actual = Carbon::now()->startOfMonth();
        $this->final_mes_actual = Carbon::now()->endOfMonth();
    }

    public function getReportsData()
    {
        $reportsData = [
            $this->incidensByMonth(),
            $this->topFive(),
            $this->incidentsByTypeLastTDays(),
            $this->incidentsByWeekDay(),
        ];

        return response()->json(['reportsData' => $reportsData]);
    }

    public function incidensByMonth()
    {
        $incidentesPorMes = Incident::selectRaw('month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $series = [];
        foreach (Helper::MONTH_NUMBER as $month) {
            if ($incidentesPorMes->pluck('month')->contains($month)) {
                $series[] = $incidentesPorMes->where('month', $month)->first()->count;
            } else {
                $series[] = 0;
            }
        }

        $data = [
            'title' => 'Incidentes por mes',
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            'type' => 'area'
        ];
        return $data;
    }

    public function topFive()
    {
        $topFive = Incident::selectRaw('indicator, COUNT(*) as count')
            ->groupBy('indicator')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        $series = $topFive
            ->map(function ($incident) {
                return $incident->count;
            });

        $labels = $topFive
            ->map(function ($incident) {
                return $incident->Indicator->Name;
            });

        $data = [
            'title' => 'Top 5',
            'series' => $series,
            'labels' => $labels,
            'type' => 'cards'
        ];

        return $data;
    }

    public function incidentsByTypeLastTDays()
    {

        $incidentes = Incident::with('Indicator')->get();
        $indicadores_usados = $incidentes->pluck('indicator');

        $series = [];
        $labels = [];

        foreach (Indicator::all() as $indicador) {
            if ($indicadores_usados->contains($indicador->id)) {
                $series[] = $incidentes->where('indicator', $indicador->id)->count();
                $labels[] = $incidentes->where('indicator', $indicador->id)->first()->Indicator->Name;
            } else {
                $series[] = 0;
                $labels[] = $indicador->Name;
            }
        }

        $data = [
            'title' => 'Incidentes por tipo últimos 30 días',
            'series' => $series,
            'labels' => $labels,
            'type' => 'bar'
        ];

        return $data;
    }

    public function incidentsByWeekDay()
    {
        $incidentes_por_tipo_incidente = Incident::select('indicator')
            ->groupBy('indicator')
            ->get();

        $series = [];
        foreach ($incidentes_por_tipo_incidente as $incidente_por_tipo_incidente) {
            $incidentes_por_dia = Incident::where('indicator', $incidente_por_tipo_incidente->indicator)
                ->selectRaw('day, COUNT(*) as count')
                ->groupBy('day')
                ->get();

            $data = [];
            foreach (Helper::DAY_NUMBER as $day) {
                if ($incidentes_por_dia->pluck('day')->contains($day)) {
                    $data[] = $incidentes_por_dia->where('day', $day)->first()->count;
                } else {
                    $data[] = 0;
                }
            }

            $series[] = [
                'name'  => $incidente_por_tipo_incidente->Indicator->Name,
                'data' => $data
            ];

        }

        $data = [
            'title' => 'Incidentes por día de la semana',
            'series' => $series,
            'labels' => Helper::DAY_NAME,
            'type' => 'column'
        ];

        return $data;
        /* $series = [];
        foreach (Helper::DAY_NUMBER as $day) {
            if ($incidentes_por_dia->pluck('day')->contains($day)) {
                $series[] = [
                    'name'  => $incidentes_por_dia->where('day', $day)->first()->Indicator->Name,
                    'data' => $incidentes_por_dia->where('day', $day)->first()->count
                ];
            } else {
                $series[] = 0;
            }
        }

        $data = [
            'title' => 'Incidentes por día de la semana',
            'series' => $series,
            'labels' => Helper::DAY_NAME,
            'type' => 'bars'
        ];

        return $data; */
    }

    /* public function incidentsByTypeLastTDays()
    {
        $incidentes_ultimos_30_dias = Incident::whereDate('created_at', '>=', now()->subDays(30))
            ->selectRaw('indicator, COUNT(*) as count, created_at')
            ->groupBy('indicator', 'created_at')
            ->get();

        $indicadoresNoUsados = DB::table('Indicators')
            ->select('id')
            ->whereNotIn('id', function ($query) {
                $query->select('indicator')
                    ->from('incident');
            })
            ->pluck('id');

        $series = $incidentes_ultimos_30_dias
            ->map(function ($incident) use ($indicadoresNoUsados){
                if ($indicadoresNoUsados->contains($incident->indicator)) {
                    return 0;
                } else {
                    return [$incident->count];
                }
            });

        $data = [
            'title' => 'Incidentes por tipo últimos 30 días',
            'series' => $series,
            'labels' => Incident::with('Indicator')->get()->pluck('Indicator.Name'),
            'type' => 'bars'
        ];

        return $data;
    } */

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
