<?php

namespace App\Strategies\StrategyReports\Villavicencio;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Models\Incident;
use App\Models\Indicator;
use Illuminate\Http\Request;
use App\Strategies\Interface\ReportsInterface;

class StrategyIncidentsReports implements ReportsInterface
{
    private $indicator;
    private $request;

    public function getReportsData(Request $request)
    {
        $this->request = $request;
        $this->indicator = $request->indicator ?? null;
        if ($this->indicator != null) {
            $reportsData = [
                $this->tabsIncidents(),
                $this->incidensByMonth(),
                $this->incidentsByWeekDay(),
                $this->points()
            ];
        } else {
            $reportsData = [
                $this->tabsIncidents(),
                $this->cardsIncidents(),
                $this->incidensByMonth(),
                $this->incidentsByTypeLastTDays(),
                $this->incidentsByWeekDay(),
            ];
        }

        return response()->json(['reportsData' => $reportsData]);
    }

    public function cardsIncidents()
    {
        $hoy = Carbon::now();

        $hace_30_dias = $hoy->copy()->subDays(30);

        $date = $hace_30_dias->format('d/m/y') . ' - ' . Carbon::now()->format('d/m/y');

        if (isset($this->request->start) && isset($this->request->end)) {
            $hoy = Carbon::parse($this->request->start);
            $hace_30_dias = Carbon::parse($this->request->end);
            $date = $hace_30_dias->format('d/m/y') . ' - ' . $hoy->format('d/m/y');
        }

        $primerDiaDelMes = $hoy->copy()->firstOfMonth();

        $diasTranscurridos = $hoy->copy()->diffInDays($primerDiaDelMes);

        $cardsIncidents = Incident::selectRaw('indicator, COUNT(*) as count')
            ->whereBetween('created_at', [$hace_30_dias, $hoy])
            ->groupBy('indicator')
            ->orderBy('count', 'desc')
            ->take(3)
            ->get();

        $indicadores = array_column($cardsIncidents->toArray(), 'indicator');

        $cantidadDiaInicioToDiaActualAnterior = [];
        $cantidadDiaInicioToDiaActualActual = [];

        foreach($indicadores as $indicador) {

            $cantidadDiaInicioToDiaActualAnterior[] = Incident::with('Indicator')->where('indicator', $indicador)->whereBetween('created_at', [$hace_30_dias->copy()->subDays($diasTranscurridos), $hace_30_dias->copy()->subDays(0)])->count();

            $cantidadDiaInicioToDiaActualActual[] = Incident::with('Indicator')->where('indicator', $indicador)->whereBetween('created_at', [$primerDiaDelMes, $hoy])->count();
        }

        $series = [];

        for ($i = 0; $i < $cardsIncidents->count(); $i++) {
            $porcentaje = $cantidadDiaInicioToDiaActualAnterior[$i] == 0 ? $cantidadDiaInicioToDiaActualActual[$i] * 100 : (($cantidadDiaInicioToDiaActualActual[$i] - $cantidadDiaInicioToDiaActualAnterior[$i]) / $cantidadDiaInicioToDiaActualAnterior[$i]) * 100;

            $series[] = [
                'data' => $cardsIncidents[$i]->count,
                'percent' => $porcentaje,
                'type' => $porcentaje > 0 ? 'red' : 'green'
            ];
        }

        $labels = $cardsIncidents
            ->map(function ($incident) {
                return $incident->Indicator->Name;
            });

        $data = [
            'title' => 'Cards de incidentes con sus respectivos porcentajes',
            'date' =>  $date,
            'series' => $series,
            'labels' => $labels,
            'type' => 'cards'
        ];

        return $data;
    }

    public function tabsIncidents()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            $tabsIncidents = Incident::whereBetween('created_at', [$this->request->start, $this->request->end])
                ->selectRaw('indicator, COUNT(*) as count')
                ->groupBy('indicator')
                ->orderBy('count', 'desc')
                ->get();
        } else {
            $tabsIncidents = Incident::selectRaw('indicator, COUNT(*) as count')
                ->groupBy('indicator')
                ->orderBy('count', 'desc')
                ->get();
        }

        $indicadores = Indicator::all();

        foreach ($indicadores as $indicardor) {
            if (!$tabsIncidents->pluck('indicator')->contains($indicardor->id)) {
                $tabsIncidents->push((object) [
                    'indicator' => $indicardor->id,
                    'count' => 0,
                    'Indicator' => $indicardor
                ]);
            }
        }

        $series = $tabsIncidents
            ->map(function ($incident) {
                return $incident->count;
            });

        $labels = $tabsIncidents
            ->map(function ($incident) {
                return $incident->Indicator->Name;
            });

        $key = $tabsIncidents
            ->map(function ($incident) {
            return $incident->indicator;
        });

        $series = $series->prepend(Incident::whereBetween('created_at', [$this->request->start, $this->request->end])->count());
        $labels = $labels->prepend('General');
        $key = $key->prepend(0);

        $data = [
            'title' => 'Incidentes por tipo',
            'series' => $series,
            'labels' => $labels,
            'key' => $key,
            'type' => 'tabs'
        ];

        return $data;
    }

    public function incidensByMonth()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            if ($this->indicator != null){
                $incidentesPorMes = Incident::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->selectRaw('month, COUNT(*) as count')
                    ->where('indicator', $this->indicator)
                    ->where('year', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
            } else {
                $incidentesPorMes = Incident::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->selectRaw('month, COUNT(*) as count')
                    ->where('year', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
            }
        } else {
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
        }

        $series = [];
        foreach (Helper::MONTH_NUMBER as $month) {
            if ($incidentesPorMes->pluck('month')->contains($month)) {
                $series[] = $incidentesPorMes->where('month', $month)->first()->count;
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
            'title' => $this->indicator != null ? Indicator::find($this->indicator)->Name . ' por mes' : 'Incidentes por mes',
            'date' =>  $date,
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            'type' => 'area'
        ];

        return $data;
    }

    public function incidentsByTypeLastTDays()
    {
        $hoy = Carbon::now();

        $hace_30_dias = $hoy->subDays(30);

        $date = $hace_30_dias->format('d/m/y') . ' - ' . Carbon::now()->format('d/m/y');

        if (isset($this->request->start) && isset($this->request->end)) {
            $hoy = Carbon::parse($this->request->start);
            $hace_30_dias = Carbon::parse($this->request->end);
            $date = $hace_30_dias->format('d/m/y') . ' - ' . $hoy->format('d/m/y');
        }

        $incidentes = Incident::with('Indicator')->whereDate('created_at', '>=', $hace_30_dias->toDateString())->get();

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
            'date' =>  $date,
            'series' => $series,
            'labels' => $labels,
            'type' => 'bar'
        ];

        return $data;
    }

    public function incidentsByWeekDay()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            if ($this->indicator != null){
                $incidentes_por_tipo_incidente = Incident::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->select('indicator')
                    ->where('indicator', $this->indicator)
                    ->groupBy('indicator')
                    ->get();
            } else {
                $incidentes_por_tipo_incidente = Incident::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->select('indicator')
                    ->groupBy('indicator')
                    ->get();
            }
        } else {
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
        }

        $series = [];

        foreach ($incidentes_por_tipo_incidente as $incidente_por_tipo_incidente) {
            if (isset($this->request->start) && isset($this->request->end)) {
                $incidentes_por_dia = Incident::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->where('indicator', $incidente_por_tipo_incidente->indicator)
                    ->selectRaw('day, COUNT(*) as count')
                    ->groupBy('day')
                    ->get();
            } else {
                $incidentes_por_dia = Incident::where('indicator', $incidente_por_tipo_incidente->indicator)
                    ->selectRaw('day, COUNT(*) as count')
                    ->groupBy('day')
                    ->get();
            }

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

        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => $this->indicator != null ? Indicator::find($this->indicator)->Name . ' por día de la semana' : 'Incidentes por día de la semana',
            'date' =>  $date,
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

            return [$latitud , $longitud];
        });

        $incidents = [
            'type' => 'heatmap',
            'points' => $incidents,
        ];

        return $incidents;
    }
}
