<?php

namespace App\Strategies\StrategyProbabilistic\Ditra;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Strategies\Interface\Ditra\ProbabilisticInterface;
use App\Models\Ditra\DataDitra;

class StrategyChoqueProbabilistic implements ProbabilisticInterface
{
    public function getProbabilisticData()
    {

        $timeInterval = 1;

        //Alarmas

        $Choque =  $this->Choque();
        $allData = $this->allData();
        $probabilidadActualChoque = ($Choque->count() > 0) ? ($Choque->count() / $allData->count()) * 100 : 0;
        $probabilidadFuturaChoque = $this->calculatePoissonProbability($probabilidadActualChoque, $timeInterval);
        $SeriesChoqueDia = $this->getDataByWeekDay($Choque);
        $SeriesChoqueHora = $this->getDataByHourDay($Choque);

        $days = [
            "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"
        ];

        $hours = [
            "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", 
            "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"
        ];

        $ProbabilisticData = [
            // "types" => [
            //     [
            //         "name" => "N/A",
            //         "key" => 0
            //     ]
            // ],
            "data" => []

        ];

        $dataChoque = [
            "probability" => [$probabilidadActualChoque, $probabilidadFuturaChoque],
            "graphs" => [
                [
                    "title" => "Cantidad de incidentes choque por dia de la semana",
                    "series" => $SeriesChoqueDia,
                    "labels" => $days,
                    "type" => "area"
                ],
                [
                    "title" => "Cantidad de incidentes choque por hora del dia",
                    "series" => $SeriesChoqueHora,
                    "labels" => $hours,
                    "type" => "area"
                ],

            ]
        ];

        array_push($ProbabilisticData['data'], $dataChoque);


        return $ProbabilisticData;
    }

    public function Choque()
    {
        $Choque = DataDitra::where('type', 'CHOQUE')->get();
        
        return $Choque;
    }

    public function allData()
    {
        $Choque =  DataDitra::all();

        return $Choque;
    }

    public function getDataByWeekDay($data)
    {
        $ocurrencias = [0, 0, 0, 0, 0, 0, 0];

        foreach ($data as $item) {
            $fechacarbon = Carbon::parse($item->occurrence_date);
            $diaSemana = $fechacarbon->isoWeekday() - 1;
            $ocurrencias[$diaSemana]++;
        }

        return $ocurrencias;
    }

    public function getDataByHourDay($data)
    {

        $ocurrencias = array_fill(0, 24, 0);

        foreach ($data as $item) {
            $fechacarbon = Carbon::parse($item->occurrence_date);
            $hora = $fechacarbon->hour;
            $ocurrencias[$hora]++;
        }

        return $ocurrencias;
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
