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

        if (isset($this->request->start) && isset($this->request->end)) {
            $general = [
                $this->cardsIncidents(),
                $this->incidensByMonth(),
                $this->incidentsByTypeLastTDays(),
                $this->incidentsByWeekDay(),
                $this->incidentsByHour()
            ];
        } else {
            $general = [
                //$this->cardsIncidents(),
                $this->incidensByMonth(),
                $this->incidentsByTypeLastTDays(),
                $this->incidentsByWeekDay(),
                $this->incidentsByHour()
            ];
        }

        $generalData = [];

        array_push($generalData, $general);

        $types = Incident::select('indicator')->orderBy('indicator', 'asc')->groupBy('indicator')->get()->toArray();

        foreach ($types as $type) {
            $data = [];
            $this->indicator = $type['indicator'] ?? null;
            $data = [
                $this->incidensByMonth(),
                $this->incidentsByWeekDay(),
                $this->points()
            ];
            array_push($generalData, $data);
        }

        $data = [
            'tabs' => $this->tabsIncidents(),
            'reportsData' => $generalData
        ];

        return response()->json($data);
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
            ->whereBetween('created_at', [$hace_30_dias, $hoy])
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
            foreach($indicadores as $indicador) {
                // $hoy es end y $hace_30_dias es start
                $primerDiaDelMes = $hoy->copy()->firstOfMonth();

                $diasTranscurridos = $hoy->copy()->diffInDays($hace_30_dias);

                $cantidadDiaInicioToDiaActualAnterior[] = Incident::with('Indicator')->where('indicator', $indicador)->whereBetween('created_at', [$hace_30_dias->copy()->subDays($diasTranscurridos), $hoy->copy()->subDays($diasTranscurridos)])->count();

                $cantidadDiaInicioToDiaActualActual[] = Incident::with('Indicator')->where('indicator', $indicador)->whereBetween('created_at', [$hace_30_dias, $hoy])->count();
            }
        } else {
            foreach($indicadores as $indicador) {

                $cantidadDiaInicioToDiaActualAnterior[] = Incident::with('Indicator')->where('indicator', $indicador)->whereBetween('created_at', [$hace_30_dias->copy()->subDays($diasTranscurridos), $hace_30_dias->copy()->subDays(0)])->count();

                $cantidadDiaInicioToDiaActualActual[] = Incident::with('Indicator')->where('indicator', $indicador)->whereBetween('created_at', [$primerDiaDelMes, $hoy])->count();
            }
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

        $indicadores = Indicator::orderBy('id', 'DESC')->get();

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

        if (isset($this->request->start) && isset($this->request->end)) {
            $series = $series->prepend(Incident::whereBetween('created_at', [$this->request->start, $this->request->end])->count());
        } else {
            $series = $series->prepend(Incident::count());
        }

        $labels = $labels->prepend('General');
        $key = $key->prepend(0);

        $data = [
            'title' => 'Tabs',
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
                    //->where('year', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->get();
            } else {
                $incidentesPorMes = Incident::selectRaw('month, COUNT(*) as count')
                    //->where('year', date('Y'))
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
            'title' => $this->indicator != null ? '# ' . Indicator::find($this->indicator)->Name . ' por mes' : '# Incidentes por mes',
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
            $incidentes = Incident::with('Indicator')->whereDate('created_at', '>=', $rango->toDateString())->get();
        } else {
            $date = 'Historico';
            $incidentes = Incident::with('Indicator')->get();
        }

        

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
            'title' => $this->indicator != null ? '# ' . Indicator::find($this->indicator)->Name . ' por día de la semana' : '# Incidentes por día de la semana',
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
                $incidentes_por_tipo_incidente = Incident::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->select('indicator', 'created_at')
                    ->where('indicator', $this->indicator)
                    ->get();
            } else {
                $incidentes_por_tipo_incidente = Incident::whereBetween('created_at', [$this->request->start, $this->request->end])
                    ->select('indicator', 'created_at')
                    ->get();
            }
        } else {
            if ($this->indicator != null){
                $incidentes_por_tipo_incidente = Incident::select('indicator', 'created_at')
                    ->where('indicator', $this->indicator)
                    ->get();
            } else {
                $incidentes_por_tipo_incidente = Incident::select('indicator', 'created_at')
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
                $createdAt = strtotime($incidente->created_at);
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
                'name' => $incidentes->first()->Indicator->Name,
                'data' => $countByInterval
            ];
        }

        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => $this->indicator != null ? '# ' . Indicator::find($this->indicator)->Name . ' por día de la semana' : 'Incidentes por intervalos de horas',
            'date' =>  $date,
            'series' => $series,
            'labels' => ['(00:00-04:00)', '(04:00-08:00)', '(08:00-12:00)', '(12:00-16:00)', '(16:00-20:00)', '(20:00-24:00)'],
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

            return [$longitud , $latitud];
        });

        $incidents = [
            'type' => 'heatmap',
            'points' => $incidents,
        ];

        return $incidents;
    }
}
