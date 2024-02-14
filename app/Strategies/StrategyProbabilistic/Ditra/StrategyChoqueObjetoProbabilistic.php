<?php

namespace App\Strategies\StrategyProbabilistic\Ditra;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Strategies\Interface\Ditra\ProbabilisticInterface;
use App\Models\Ditra\DataDitra;

class StrategyChoqueObjetoProbabilistic implements ProbabilisticInterface
{
    public function getProbabilisticData()
    {

        $timeInterval = 1;

        //Alarmas

        $ChoqueObjeto =  $this->ChoqueObjeto();
        $allData = $this->allData();
        $probabilidadActualChoqueObjeto = ($ChoqueObjeto->count() > 0) ? ($ChoqueObjeto->count() / $allData->count()) * 100 : 0;
        $probabilidadFuturaChoqueObjeto = $this->calculatePoissonProbability($probabilidadActualChoqueObjeto, $timeInterval);
        $SeriesChoqueObjetoDia = $this->getDataByWeekDay($ChoqueObjeto);
        $SeriesChoqueObjetoHora = $this->getDataByHourDay($ChoqueObjeto);

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

        $dataChoqueObjeto = [
            "probability" => [$probabilidadActualChoqueObjeto, $probabilidadFuturaChoqueObjeto],
            "graphs" => [
                [
                    "title" => "Cantidad de incidentes choque objeto fijo por dia de la semana",
                    "series" => $SeriesChoqueObjetoDia,
                    "labels" => $days,
                    "type" => "area"
                ],
                [
                    "title" => "Cantidad de incidentes choque objeto fijo por hora del dia",
                    "series" => $SeriesChoqueObjetoHora,
                    "labels" => $hours,
                    "type" => "area"
                ],

            ]
        ];

        array_push($ProbabilisticData['data'], $dataChoqueObjeto);


        return $ProbabilisticData;
    }

    public function ChoqueObjeto()
    {
        $ChoqueObjeto = DataDitra::where('type', 'CHOQUE CON OBJETO FIJO')->get();
        
        return $ChoqueObjeto;
    }

    public function allData()
    {
        $ChoqueObjeto =  DataDitra::all();

        return $ChoqueObjeto;
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
