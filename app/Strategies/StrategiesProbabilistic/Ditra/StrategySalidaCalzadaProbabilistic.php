<?php

namespace App\Strategies\StrategiesProbabilistic\Ditra;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Strategies\Interface\Ditra\ProbabilisticInterface;
use App\Models\Ditra\DataDitra;

class StrategySalidaCalzadaProbabilistic implements ProbabilisticInterface
{
    public function getProbabilisticData()
    {
        
        $timeInterval = 1;

        $SalidaCalzada =  $this->SalidaCalzada();
        $allData = $this->allData();
        $probabilidadActualSalidaCalzada = ($SalidaCalzada->count() > 0) ? ($SalidaCalzada->count() / $allData->count()) * 100 : 0;
        $probabilidadFuturaSalidaCalzada = $this->calculatePoissonProbability($probabilidadActualSalidaCalzada, $timeInterval);

        $ProbabilisticData = [
            "types" => [
                [
                    "name" => "Salida Calzada",
                    "key" => 0
                ]
            ],
            "data" => []

        ];

        $dataSalidaCalzada = [
            "probability" => [$probabilidadActualSalidaCalzada, $probabilidadFuturaSalidaCalzada],
            // "graphs" => [
            //     [
            //         "title" => "Cantidad de incidentes volcamiento por dia de la semana",
            //         "series" => $SeriesVolcamientoDia,
            //         "labels" => $days,
            //         "type" => "area"
            //     ],
            //     [
            //         "title" => "Cantidad de incidentes volcamiento por hora del dia",
            //         "series" => $SeriesVolcamientoHora,
            //         "labels" => $hours,
            //         "type" => "area"
            //     ],

            // ]
        ];

        array_push($ProbabilisticData['data'], $dataSalidaCalzada);
        array_push($ProbabilisticData['data'], $this->StatisticsByIndicator()->original);


        return $ProbabilisticData;
    }

    public function SalidaCalzada()
    {
        $SalidaCalzada = DataDitra::where('type', 'SALIDA DE CALZADA')->get();
        
        return $SalidaCalzada;
    }

    public function allData()
    {
        $SalidaCalzada =  DataDitra::all();

        return $SalidaCalzada;
    }

        public function StatisticsByIndicator()
    {

        // Obtener la hora con más ocurrencias de accidentes históricamente por indicador y cuadrícula
        $horaMasOcurrencias = DataDitra::where('indicator', '=', 6)
            ->groupBy('hour')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('hour')
            ->first();

        // Obtener el día de la semana con más ocurrencias de accidentes históricamente por indicador y cuadrícula
        $diaSemanaMasOcurrencias = DataDitra::where('indicator', '=', 6)
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('day')
            ->first();

        // Definir todos los días de la semana
        $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

        // Obtener cantidad de accidentes por día de la semana
        $accidentesPorDiaSemana = DataDitra::where('indicator', '=', 6)
            ->selectRaw('day, COUNT(*) as count')
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // Crear una colección para almacenar los resultados
        $porcentajePorDiaSemana = collect();

        // Iterar sobre todos los días de la semana
        foreach ($diasSemana as $dia) {
            $accidentes = $accidentesPorDiaSemana->firstWhere('day', $dia);

            $porcentaje = [
                'day' => $dia,
                'percentage' => $accidentes ? ($accidentes->count / $accidentesPorDiaSemana->sum('count')) * 100 : 0,
            ];

            $porcentajePorDiaSemana->push($porcentaje);
        }

        return response()->json(['horaMasOcurrencias' => $horaMasOcurrencias, 'diaSemanaMasOcurrencias' => $diaSemanaMasOcurrencias, 'porcentajePorDiaSemana' => $porcentajePorDiaSemana]);
    }

    private function calculatePoissonProbability($mean, $k)
    {
        $logProbability = -$mean + ($k * log($mean)) - $this->logFactorial($k);

        return abs($logProbability);
    }

    private function logFactorial($n)
    {
        return ($n == 0) ? 0 : array_sum(array_map('log', range(1, $n)));
    }
}
