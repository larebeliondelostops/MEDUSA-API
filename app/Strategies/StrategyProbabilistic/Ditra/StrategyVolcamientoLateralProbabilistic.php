<?php

namespace App\Strategies\StrategyProbabilistic\Ditra;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Strategies\Interface\Ditra\ProbabilisticInterface;
use App\Models\Ditra\DataDitra;

class StrategyVolcamientoLateralProbabilistic implements ProbabilisticInterface
{
    public function getProbabilisticData()
    {

        $timeInterval = 1;

        $VolcamientoLateral =  $this->VolcamientoLateral();
        $allData = $this->allData();
        $probabilidadActualVolcamientoLateral = ($VolcamientoLateral->count() > 0) ? ($VolcamientoLateral->count() / $allData->count()) * 100 : 0;
        $probabilidadFuturaVolcamientoLateral = $this->calculatePoissonProbability($probabilidadActualVolcamientoLateral, $timeInterval);

        $ProbabilisticData = [
            "types" => [
                [
                    "name" => "Volcamiento lateral",
                    "key" => 0
                ]
            ],
            "data" => []

        ];

        $dataVolcamientoLateral = [
            "probability" => [$probabilidadActualVolcamientoLateral, $probabilidadFuturaVolcamientoLateral],
        ];

        array_push($ProbabilisticData['data'], $dataVolcamientoLateral);
        array_push($ProbabilisticData['data'], $this->StatisticsByIndicator()->original);


        return $ProbabilisticData;
    }

    public function VolcamientoLateral()
    {
        $VolcamientoLateral = DataDitra::where('type', 'VOLCAMIENTO LATERAL')->get();
        
        return $VolcamientoLateral;
    }

    public function allData()
    {
        $VolcamientoLateral =  DataDitra::all();

        return $VolcamientoLateral;
    }

    public function StatisticsByIndicator()
    {

        // Obtener la hora con más ocurrencias de accidentes históricamente por indicador y cuadrícula
        $horaMasOcurrencias = DataDitra::where('indicator', '=', 1)
            ->groupBy('hour')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('hour')
            ->first();

        // Obtener el día de la semana con más ocurrencias de accidentes históricamente por indicador y cuadrícula
        $diaSemanaMasOcurrencias = DataDitra::where('indicator', '=', 1)
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('day')
            ->first();

        // Definir todos los días de la semana
        $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

        // Obtener cantidad de accidentes por día de la semana
        $accidentesPorDiaSemana = DataDitra::where('indicator', '=', 1)
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
