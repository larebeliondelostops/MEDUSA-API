<?php

namespace App\Strategies\StrategiesReports\Villavicencio;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Models\Indicator;
use Illuminate\Http\Request;
use App\Models\Villavicencio\Ipats as Incident;
use App\Interfaces\Reports\ReportActionsInterface;

class StrategyIpatsReports implements ReportActionsInterface
{
    private $indicator;
    private $request;
    private $indicadores;

    public function getReportsData(Request $request)
    {
        $this->request = $request;

        if (isset($this->request->start) && isset($this->request->end)) {
            $general = [
                //$this->cardsIncidents(),
                $this->incidensByMonth(),
                $this->incidentsByTypeLastTDays(),
                $this->incidentsByWeekDay(),
                //$this->incidentsByHour()
                $this->incidentsHeatMap(),
            ];
        } else {
            $general = [
                //$this->cardsIncidents(),
                $this->incidensByMonth(),
                $this->incidentsByTypeLastTDays(),
                $this->incidentsByWeekDay(),
                //$this->incidentsByHour()
                $this->incidentsHeatMap(),
            ];
        }

        $generalData = [];

        array_push($generalData, $general);

        //$types = Incident::select('indicator')->orderBy('indicator', 'asc')->groupBy('indicator')->get()->toArray();

        $tabs = $this->tabsIncidents();

        if ($this->indicadores[0] == 0) {
            unset($this->indicadores[0]);
        }

        //dd($types);
        foreach ($this->indicadores as $type) {
            $data = [];
            $this->indicator = $type ?? null;
            //dd($this->indicator);
            $data = [
                $this->incidensByMonth(),
                $this->incidentsByWeekDay(),
                //$this->incidentsByHour(),
                //$this->incidentsByTypeHeatMap(),
                $this->points()
            ];
            array_push($generalData, $data);
        }

        $data = [
            'tabs' => $tabs,
            'reportsData' => $generalData
        ];

        return $data;
    }

    public function cardsIncidents()
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

        $cardsIncidents = Incident::selectRaw('indicator, COUNT(*) as count')
            ->whereBetween('date_ipat', [$hace_30_dias, $hoy])
            ->groupBy('indicator')
            ->orderBy('count', 'desc')
            ->take(3)
            ->get();

        $cantidadEncontrados = count($cardsIncidents);

        if ($cantidadEncontrados < 3) {

            $existingIndicators = $cardsIncidents->pluck('indicator')->toArray();

            $cardsOthersIncidents = Incident::selectRaw('indicator, COUNT(*) as count')
                ->whereNotIn('indicator', $existingIndicators)
                ->groupBy('indicator')
                ->orderBy('count', 'desc')
                ->take(3 - $cantidadEncontrados)
                ->get();

            foreach ($cardsOthersIncidents as $incident) {
                $incident->count = 0;
            }

            $cardsIncidents = $cardsIncidents->concat($cardsOthersIncidents);
        }

        $indicadores = array_column($cardsIncidents->toArray(), 'indicator');

        $cantidadDiaInicioToDiaActualAnterior = [];
        $cantidadDiaInicioToDiaActualActual = [];

        if (isset($this->request->start) && isset($this->request->end)) {
            $this->incidents = Incident::select('id_agent', 'injured', 'victims', 'latitude', 'longitude', 'date_ipat')->whereBetween('date_ipat', [$this->request->start, $this->request->end])->get();
        } else {
            $this->incidents = Incident::select('id_agent', 'injured', 'victims', 'latitude', 'longitude', 'date_ipat')->get();
        }

        $series = [];

        for ($i = 0; $i < $cardsIncidents->count(); $i++) {

            $porcentaje = $cantidadDiaInicioToDiaActualAnterior[$i] == 0 ? $cantidadDiaInicioToDiaActualActual[$i] * 100 : (($cantidadDiaInicioToDiaActualActual[$i] - $cantidadDiaInicioToDiaActualAnterior[$i]) / $cantidadDiaInicioToDiaActualAnterior[$i]) * 100;

            $porcentaje = $cantidadDiaInicioToDiaActualActual[$i] == 0 ? $cantidadDiaInicioToDiaActualAnterior[$i] * -100 : $porcentaje;

            $series[] = [
                'data' => $cardsIncidents[$i]->count,
                'percent' => round($porcentaje, 2),
                'type' => $porcentaje > 0 ? 'red' : 'green'
            ];
        }

        $labels = $cardsIncidents
            ->map(function ($incident) {
                return $incident->Indicator->name;
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
            $tabsIncidents = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
                ->selectRaw('indicator, COUNT(*) as count')
                ->groupBy('indicator')
                ->orderBy('indicator', 'asc')
                ->get();
        } else {
            $tabsIncidents = Incident::selectRaw('indicator, COUNT(*) as count')
                ->groupBy('indicator')
                ->orderBy('indicator', 'asc')
                ->get();
        }

        $indicadores = Indicator::whereBetween('id', [12, 15])->orderBy('id', 'DESC')->get();

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
                return $incident->Indicator->name;
            });

        $key = $tabsIncidents
            ->map(function ($incident) {
            return $incident->indicator;
        });
        //dd($key);
        if (isset($this->request->start) && isset($this->request->end)) {
            $series = $series->prepend(Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])->count());
        } else {
            $series = $series->prepend(Incident::count());
        }

        $this->indicadores = $key;

        $labels = $labels->prepend('General');
        $key = $key->prepend(0);

        $data = [
            'title' => 'Tabs',
            'series' => $series,
            'labels' => $labels,
            'key' => array_keys($key->toArray()),
            'type' => 'tabs'
        ];

        return $data;
    }

    public function incidensByMonth()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            if ($this->indicator != null){
                $incidentesPorMes = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
                    ->where('indicator', $this->indicator)
                    ->selectRaw('EXTRACT(MONTH FROM date_ipat) AS month, EXTRACT(YEAR FROM date_ipat) AS year, COUNT(*) as count')
                    ->whereRaw('EXTRACT(YEAR FROM date_ipat) = ?', [date('Y')])
                    ->groupBy('month', 'year')
                    ->orderBy('month', 'asc')
                    ->get();
            } else {
                $incidentesPorMes = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
                    ->selectRaw('EXTRACT(MONTH FROM date_ipat) AS month, EXTRACT(YEAR FROM date_ipat) AS year, COUNT(*) as count')
                    ->whereRaw('EXTRACT(YEAR FROM date_ipat) = ?', [date('Y')])
                    ->groupBy('month', 'year')
                    ->orderBy('month', 'asc')
                    ->get();
            }
        } else {
            if ($this->indicator != null){
                $incidentesPorMes = Incident::selectRaw('EXTRACT(MONTH FROM date_ipat) AS month, COUNT(*) as count')
                    ->where('indicator', $this->indicator)
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
            } else {
                $incidentesPorMes = Incident::selectRaw('EXTRACT(MONTH FROM date_ipat) AS month, COUNT(*) as count')
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
            $date = 'Historico';
        }

        $data = [
            'title' => $this->indicator != null ? '# ' . Indicator::find($this->indicator)->name . ' por mes' : '# Incidentes por mes',
            'date' =>  $date,
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            'type' => 'area'
        ];

        return $data;
    }

    public function incidentsByTypeLastTDays()
    {


        if (isset($this->request->start) && isset($this->request->end)) {
            $hoy =  Carbon::parse($this->request->end);
            $rango = Carbon::parse($this->request->start);
            $date = $rango->format('d/m/y') . ' - ' . $hoy->format('d/m/y');
            $incidentes = Incident::with('Indicator')->whereDate('date_ipat', '>=', $rango->toDateString())->get();
        } else {
            $date = 'Historico';
            $incidentes = Incident::with('Indicator')->get();
        }



        $indicadores_usados = $incidentes->pluck('indicator');

        $series = [];
        $labels = [];

        foreach (Indicator::whereBetween('id', [11, 15])->get() as $indicador) {
            if ($indicadores_usados->contains($indicador->id)) {
                $series[] = $incidentes->where('indicator', $indicador->id)->count();
                $labels[] = $incidentes->where('indicator', $indicador->id)->first()->Indicator->name;
            } else {
                $series[] = 0;
                $labels[] = $indicador->name;
            }
        }

        $data = [
            'title' => '# Incidentes por tipo',
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
                $incidentes_por_tipo_incidente = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
                    ->select('indicator')
                    ->where('indicator', $this->indicator)
                    ->groupBy('indicator')
                    ->get();
            } else {
                $incidentes_por_tipo_incidente = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
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
                $incidentes_por_dia = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
                    ->where('indicator', $incidente_por_tipo_incidente->indicator)
                    ->selectRaw('EXTRACT(DOW FROM date_ipat) AS day, COUNT(*) as count')
                    ->groupBy('day')
                    ->get();
            } else {
                $incidentes_por_dia = Incident::where('indicator', $incidente_por_tipo_incidente->indicator)
                    ->selectRaw('EXTRACT(DOW FROM date_ipat) AS day, COUNT(*) as count')
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
                'name'  => $incidente_por_tipo_incidente->Indicator->name,
                'data' => $data
            ];

        }

        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => $this->indicator != null ? '# ' . Indicator::find($this->indicator)->name . ' por día de la semana' : '# Incidentes por día de la semana',
            'date' =>  $date,
            'series' => $series,
            'labels' => Helper::DAY_NAME,
            'type' => 'column'
        ];

        return $data;
    }

    public function incidentsByHour()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            if ($this->indicator != null){
                $incidentes_por_tipo_incidente = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
                    ->select('indicator', 'date_ipat')
                    ->where('indicator', $this->indicator)
                    ->get();
            } else {
                $incidentes_por_tipo_incidente = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
                    ->select('indicator', 'date_ipat')
                    ->get();
            }
        } else {
            if ($this->indicator != null){
                $incidentes_por_tipo_incidente = Incident::select('indicator', 'date_ipat')
                    ->where('indicator', $this->indicator)
                    ->get();
            } else {
                $incidentes_por_tipo_incidente = Incident::select('indicator', 'date_ipat')
                    ->get();
            }
        }

        // Definir los límites de los intervalos (en horas)
        $intervalLimits = [
            ['start' => 0, 'end' => 4],
            ['start' => 4, 'end' => 8],
            ['start' => 8, 'end' => 12],
            ['start' => 12, 'end' => 16],
            ['start' => 16, 'end' => 20],
            ['start' => 20, 'end' => 24],
        ];

        $series = [];
        $labels = [];

        foreach ($incidentes_por_tipo_incidente->groupBy('indicator') as $incidentes) {
            $countByInterval = [0, 0, 0, 0, 0, 0];
            foreach ($incidentes as $incidente) {
                // Obtener la hora de creación de la instancia de Incident
                $createdAt = strtotime($incidente->date_ipat);
                $hour = date('G', $createdAt);

                // Verificar en qué intervalo cae la hora y aumentar el conteo correspondiente
                foreach ($intervalLimits as $index => $limit) {
                    if ($hour >= $limit['start'] && $hour < $limit['end']) {
                        $countByInterval[$index]++;
                        break; // Salir del bucle una vez que se ha encontrado el intervalo correcto
                    }
                }
            }

            $series[] = [
                'name' => $incidentes->first()->Indicator->name,
                'data' => $countByInterval
            ];
        }

        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => $this->indicator != null ? '# ' . Indicator::find($this->indicator)->name . ' por intervalos de horas' : '# Incidentes por intervalos de horas',
            'date' =>  $date,
            'series' => $series,
            'labels' => ['(00:00-04:00)', '(04:00-08:00)', '(08:00-12:00)', '(12:00-16:00)', '(16:00-20:00)', '(20:00-24:00)'],
            'type' => 'column'
        ];

        return $data;
    }

    public function incidentsByTypeHeatMap()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            $incidentes_por_tipo_incidente = Incident::whereBetween('date_ipat', [$this->request->start, $this->request->end])
                ->select('indicator', 'date_ipat')
                //->selectRaw('DAYNAME(date_ipat) AS day')
                ->selectRaw("EXTRACT(DOW FROM date_ipat) AS day")
                ->where('indicator', $this->indicator)
                ->get();
        } else {
            $incidentes_por_tipo_incidente = Incident::select('indicator', 'date_ipat')
                ->selectRaw("EXTRACT(DOW FROM date_ipat) AS day")
                ->where('indicator', $this->indicator)
                ->get();
        }

        $data = $incidentes_por_tipo_incidente->toArray();

        // Definir los rangos de horas específicos
        $intervalLimits = [
            ['start' => 0, 'end' => 4],
            ['start' => 4, 'end' => 8],
            ['start' => 8, 'end' => 12],
            ['start' => 12, 'end' => 16],
            ['start' => 16, 'end' => 20],
            ['start' => 20, 'end' => 24],
        ];

        // Transformación de datos
        $series = [];

        // Iterar sobre todos los días de la semana
        foreach (Helper::DAY_NUMBER as $diaSemana) {
            $dayData = ['name' => Helper::diaNombre($diaSemana), 'data' => []];

            // Iterar sobre los rangos de horas específicos
            foreach ($intervalLimits as $interval) {
                // Filtrar datos para el día de la semana y el rango de hora actual
                $dayAndIntervalData = array_filter($data, function ($incident) use ($diaSemana, $interval) {
                    $dayNumber = (int)$incident['day'];
                    $hour = (int)date('G', strtotime($incident['date_ipat']));

                    return $diaSemana == $dayNumber && $hour >= $interval['start'] && $hour < $interval['end'];
                });

                // Contar la cantidad de incidentes en el rango de horas
                $incidentCount = count($dayAndIntervalData);

                $dayData['data'][] = ['x' => "{$interval['start']}-{$interval['end']}", 'y' => $incidentCount];
            }

            $series[] = $dayData;
        }

        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => Indicator::find($this->indicator)->name . ' por día de la semana y rango de horas',
            'date' =>  $date,
            'series' => $series,
            //'labels' => ['(00:00-04:00)', '(04:00-08:00)', '(08:00-12:00)', '(12:00-16:00)', '(16:00-20:00)', '(20:00-24:00)'],
            'type' => 'matrix'
        ];

        return $data;
    }

    public function incidentsTopAgents()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            $incidents = Incident::select('id_agent', 'injured', 'victims', 'date_ipat')->whereBetween('date_ipat', [$this->request->start, $this->request->end])->get();
        } else {
            $incidents = Incident::select('id_agent', 'injured', 'victims', 'date_ipat')->get();
        }

        $incidents = $incidents->groupBy('id_agent')->toArray();

        $data = [];

        foreach ($incidents as $key => $incident) {

            $data[] = [
                'id_agent' => $key,
                'cantidad_atendida' => count($incident)
            ];
        }

        $agentes_incidentes = collect($data)->sortByDesc('cantidad_atendida')->take(10)->values()->toArray();

        $series = [];
        $labels = [];

        foreach ($agentes_incidentes as $agentes_incidente) {
            $series[] = $agentes_incidente['cantidad_atendida'];
            $labels[] = $agentes_incidente['id_agent'];
        }

        if (isset($this->request->start) && isset($this->request->end)) {
            $hoy =  Carbon::parse($this->request->end);
            $rango = Carbon::parse($this->request->start);
            $date = $rango->format('d/m/y') . ' - ' . $hoy->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => 'Top 10 Agentes con más incidentes atendidos',
            'date' =>  $date,
            'series' => $series,
            'labels' => $labels,
            'type' => 'bar'
        ];

        return $data;
    }

    public function incidentsHeatMap()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            $incidents = Incident::select('id_agent', 'injured', 'victims', 'date_ipat')->whereBetween('date_ipat', [$this->request->start, $this->request->end])->get();
        } else {
            $incidents = Incident::select('id_agent', 'injured', 'victims', 'date_ipat')->get();
        }

        $incidents->each(function ($incident) {
            $incident->getDay();
        });

        $incidents->each(function ($incident) {
            $incident->getMonth();
        });

        $data = $incidents->sortBy('month')->groupBy('month')->toArray();

        // Transformación de datos
        $series = [];

        // Definir el rango de días (1-31)
        $rangoDias = range(1, 31);
        //dd($data);
        foreach (Helper::MONTH_NUMBER_DB as $mes) {

            $monthData = ['name' => Helper::mesNombre($mes), 'data' => []];

            foreach ($rangoDias as $day) {
                // Verificar si hay datos para el mes y día actual
                $monthAndDayData = $data[$mes] ?? [];

                $dayIncidents = array_filter($monthAndDayData, function ($incident) use ($day) {
                    return (int)$incident['day'] === $day;
                });

                $monthData['data'][] = ['x' => str_pad($day, 2, '0', STR_PAD_LEFT), 'y' => count($dayIncidents)];
            }

            $series[] = $monthData;
        }
        //dd($series);
        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => '# Incidentes por recurrencia',
            'date' =>  $date,
            'series' => $series,
            //'labels' => ['(00:00-04:00)', '(04:00-08:00)', '(08:00-12:00)', '(12:00-16:00)', '(16:00-20:00)', '(20:00-24:00)'],
            'type' => 'matrix'
        ];

        return $data;
    }

    public function points()
    {

        $incidents = Incident::where('indicator', $this->indicator)->get();

        $incidents = $incidents->map(function ($incident) {

            return [(float)$incident->latitude , (float)$incident->longitude];

        });

        $incidents = [
            'type' => 'heatmap',
            'points' => $incidents,
        ];

        return $incidents;
    }
}
