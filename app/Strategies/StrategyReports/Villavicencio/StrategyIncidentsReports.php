<?php

namespace App\Strategies\StrategyReports\Villavicencio;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Models\Incident;
use App\Models\Indicator;
use Illuminate\Http\Request;

class StrategyIncidentsReports
{
    private $indicator;

    public function __construct()
    {
    }

    public function getReportsData(Request $request)
    {
        $this->indicator = $request->indicator ?? null;
        if ($this->indicator != null) {
            $reportsData = [
                $this->incidensByMonth(),
                $this->cardsIncidents(),
                $this->incidentsByWeekDay(),
                $this->points()
            ];
        } else {
            $reportsData = [
                $this->incidensByMonth(),
                $this->cardsIncidents(),
                $this->incidentsByTypeLastTDays(),
                $this->incidentsByWeekDay(),
            ];
        }

        return response()->json(['reportsData' => $reportsData]);
    }

    public function incidensByMonth()
    {
        if ($this->indicator != null){
            $incidentesPorMes = Incident::selectRaw('month, COUNT(*) as count')
                ->where('indicator', $this->indicator)
                ->where('year', date('Y'))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();
        } else {
            $incidentesPorMes = Incident::selectRaw('month, COUNT(*) as count')
                ->where('year', date('Y'))
                ->groupBy('month')
                ->orderBy('month', 'asc')
                ->get();
        }

        $series = [];
        foreach (Helper::MONTH_NUMBER as $month) {
            if ($incidentesPorMes->pluck('month')->contains($month)) {
                $series[] = $incidentesPorMes->where('month', $month)->first()->count;
            } else {
                $series[] = 0;
            }
        }

        $data = [
            'title' => $this->indicator != null ? '# ' . Indicator::find($this->indicator)->Name . ' por mes' : '# Incidentes por mes',
            'date' =>  date('Y'),
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            'type' => 'area'
        ];
        return $data;
    }

    public function cardsIncidents()
    {
        $cardsIncidents = Incident::selectRaw('indicator, COUNT(*) as count')
            ->groupBy('indicator')
            ->orderBy('count', 'desc')
            ->get();

        $indicadores = Indicator::all();

        foreach ($indicadores as $indicardor) {
            if (!$cardsIncidents->pluck('indicator')->contains($indicardor->id)) {
                $cardsIncidents->push((object) [
                    'indicator' => $indicardor->id,
                    'count' => 0,
                    'Indicator' => $indicardor
                ]);
            }
        }

        $series = $cardsIncidents
            ->map(function ($incident) {
                return $incident->count;
            });

        $labels = $cardsIncidents
            ->map(function ($incident) {
                return $incident->Indicator->Name;
            });

        $key = $cardsIncidents
            ->map(function ($incident) {
            return $incident->indicator;
        });

        $series = $series->prepend(Incident::count());
        $labels = $labels->prepend('General');
        $key = $key->prepend(0);

        $data = [
            'title' => '# Incidentes por tipo',
            'series' => $series,
            'labels' => $labels,
            'key' => $key,
            'type' => 'cards'
        ];

        return $data;
    }

    public function incidentsByTypeLastTDays()
    {
        $hoy = Carbon::now();

        $hace_30_dias = $hoy->subDays(30);

        $incidentes = Incident::with('Indicator')->whereDate('created_at', '>=', $hace_30_dias)->get();
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
            'title' => '# Incidentes por tipo últimos 30 días',
            'date' =>  $hace_30_dias->format('d/m/y') . ' - ' . Carbon::now()->format('d/m/y'),
            'series' => $series,
            'labels' => $labels,
            'type' => 'bar'
        ];

        return $data;
    }

    public function incidentsByWeekDay()
    {
        if ($this->indicator != null){
            $incidentes_por_tipo_incidente = Incident::select('indicator')
                ->where('indicator', $this->indicator)
                ->groupBy('indicator')
                ->get();
        } else {
            $incidentes_por_tipo_incidente = Incident::select('indicator')
                ->groupBy('indicator')
                ->get();
        }

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
            'title' => $this->indicator != null ? '# ' . Indicator::find($this->indicator)->Name . ' por día de la semana' : '# Incidentes por día de la semana',
            'date' =>  'Historico',
            'series' => $series,
            'labels' => Helper::DAY_NAME,
            'type' => 'column'
        ];

        return $data;
    }

    public function points()
    {
        $incidents = Incident::where('indicator', $this->indicator)->get();

        $incidents = $incidents->map(function ($incident) {
            $coordenadas = explode(', ', $incident->position);
            // Convierte los valores en números
            $latitud = (float)$coordenadas[0];
            $longitud = (float)$coordenadas[1];

            return [$longitud, $latitud];
        });

        $incidents = [
            'type' => 'heatmap',
            'points' => $incidents,
        ];

        return $incidents;
    }
}
