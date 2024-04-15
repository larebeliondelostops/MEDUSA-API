<?php

namespace App\Strategies\StrategyProbabilistic\Ditra;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Strategies\Interface\Ditra\ProbabilisticInterface;
use App\Models\Ditra\DataDitra;

class StrategyOtroProbabilistic implements ProbabilisticInterface
{
    public function getProbabilisticData()
    {

        $timeInterval = 1;

        $Otro =  $this->Otro();
        $allData = $this->allData();
        $probabilidadActualOtro = ($Otro->count() > 0) ? ($Otro->count() / $allData->count()) * 100 : 0;
        $probabilidadFuturaOtro = $this->calculatePoissonProbability($probabilidadActualOtro, $timeInterval);

        $ProbabilisticData = [
            "types" => [
                [
                    "name" => "Otro",
                    "key" => 0
                ]
            ],
            "data" => []

        ];

        $dataOtro = [
            "probability" => [$probabilidadActualOtro, $probabilidadFuturaOtro],
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

        array_push($ProbabilisticData['data'], $dataOtro);
        array_push($ProbabilisticData['data'], $this->StatisticsByIndicator()->original);


        return $ProbabilisticData;
    }

    public function Otro()
    {
        $Otro = DataDitra::where('type', 'OTRO')->get();
        
        return $Otro;
    }

    public function allData()
    {
        $Otro =  DataDitra::all();

        return $Otro;
    }

        public function StatisticsByIndicator()
    {

        // Obtener la hora con más ocurrencias de accidentes históricamente por indicador y cuadrícula
        $horaMasOcurrencias = DataDitra::where('indicator', '=', 9)
            ->groupBy('hour')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('hour')
            ->first();

        // Obtener el día de la semana con más ocurrencias de accidentes históricamente por indicador y cuadrícula
        $diaSemanaMasOcurrencias = DataDitra::where('indicator', '=', 9)
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('day')
            ->first();

        // Definir todos los días de la semana
        $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

        // Obtener cantidad de accidentes por día de la semana
        $accidentesPorDiaSemana = DataDitra::where('indicator', '=', 9)
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
