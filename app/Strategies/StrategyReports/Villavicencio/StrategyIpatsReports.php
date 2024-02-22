<?php

namespace App\Strategies\StrategyReports\Villavicencio;

use Carbon\Carbon;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Ipats as Incident;
use App\Strategies\Interface\ReportsInterface;

class StrategyIpatsReports implements ReportsInterface
{
    private $request;

    private $incidents;

    public function getReportsData(Request $request)
    {
        $this->request = $request;

        $this->getIncidents();

        $data = [
            $this->incidensByMonth(),
            $this->incidentsByWeekDay(),
            $this->incidentsHeatMap(),
            $this->points()
        ];

        $data = [
            'tabs' => $this->tabsIncidents(),
            'reportsData' => [$data]
        ];

        return response()->json($data);
    }

    public function getIncidents()
    {
        if (isset($this->request->start) && isset($this->request->end)) {
            $this->incidents = Incident::select('injured', 'victims', 'coordinates', 'date_ipat')->whereBetween('date_ipat', [$this->request->start, $this->request->end])->get();
        } else {
            $this->incidents = Incident::select('injured', 'victims', 'coordinates', 'date_ipat')->get();
        }
    }

    public function tabsIncidents()
    {
        $incidents = $this->incidents;

        $data = [
            'title' => 'Tabs',
            'series' => [$incidents->count()],
            'labels' => ["General"],
            'key' => [0],
            'type' => 'tabs'
        ];

        return $data;
    }

    public function incidensByMonth()
    {
        $incidents = $this->incidents;

        $incidents->each(function ($incident) {
            $incident->getMonth();
        });

        $meses_usados = array_keys($incidents->groupBy('month')->toArray());

        $series = [];
        foreach (Helper::MONTH_NUMBER as $month) {
            if (in_array($month, $meses_usados)) {

                $series[] = $incidents->where('month', $month)->count();
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
            'title' => '# Incidentes por mes',
            'date' =>  $date,
            'series' => $series,
            'labels' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            'type' => 'area'
        ];

        return $data;
    }

    public function incidentsByWeekDay()
    {
        $incidents = $this->incidents;

        $incidents->each(function ($incident) {
            $incident->getDay();
            $incident->getDayOfWeek();
        });

        $dias_usados = array_keys($incidents->groupBy('dayOfWeek')->toArray());

        $series = [];

        $data = [];

        foreach (Helper::DAY_NUMBER as $day) {
            if (in_array($day, $dias_usados)) {
                $data[] = $incidents->where('dayOfWeek', $day)->sum('victims');
            } else {
                $data[] = 0;
            }
        }

        $series[] = [
            'name'  => "Victimas",
            'data' => $data
        ];

        $data = [];

        foreach (Helper::DAY_NUMBER as $day) {
            if (in_array($day, $dias_usados)) {
                $data[] = $incidents->where('dayOfWeek', $day)->sum('injured');
            } else {
                $data[] = 0;
            }
        }

        $series[] = [
            'name'  => "Heridos",
            'data' => $data
        ];

        if (isset($this->request->start) && isset($this->request->end)) {
            $date = Carbon::parse($this->request->start)->format('d/m/y') . ' - ' . Carbon::parse($this->request->end)->format('d/m/y');
        } else {
            $date = 'Historico';
        }

        $data = [
            'title' => '# Incidentes por día de la semana',
            'date' =>  $date,
            'series' => $series,
            'labels' => Helper::DAY_NAME,
            'type' => 'column'
        ];

        return $data;
    }

    public function incidentsHeatMap()
    {
        $incidents = $this->incidents;

        $data = $incidents->sortBy('month')->groupBy('month')->toArray();

        // Transformación de datos
        $series = [];

        // Definir el rango de días (1-31)
        $rangoDias = range(1, 31);

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

        $incidents = $this->incidents;

        $incidents = $incidents->map(function ($incident) {
            $coordenadas = explode(', ', $incident->coordinates);

            // Convierte los valores en números
            $latitud = (float)$coordenadas[1];
            $longitud = (float)$coordenadas[0];

            return [$longitud , $latitud];
        });

        $incidents = [
            'type' => 'heatmap',
            'points' => $incidents,
        ];

        return $incidents;
    }
}
