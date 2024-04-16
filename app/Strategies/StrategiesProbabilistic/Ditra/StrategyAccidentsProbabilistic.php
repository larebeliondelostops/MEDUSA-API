<?php

namespace App\Strategies\StrategiesProbabilistic\Ditra;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Strategies\Interface\Ditra\ProbabilisticInterface;
use App\Models\Ditra\DataDitra;

class StrategyAccidentsProbabilistic implements ProbabilisticInterface
{
    public function getProbabilisticData()
    {
        $ProbabilisticData = [
            "types" => [
                [
                    "name" => "N/A",
                    "key" => 0,
                    "id" => 1
                ],
                [
                    "name" => "Choque",
                    "key" => 1,
                    "id" => 2
                ],
                [
                    "name" => "Choque con objeto fijo",
                    "key" => 2,
                    "id" => 3
                ],
                [
                    "name" => "Volcamiento lateral",
                    "key" => 3,
                    "id" => 4
                ],
                [
                    "name" => "Volcamiento",
                    "key" => 4,
                    "id" => 5
                ],
                [
                    "name" => "Salida de calzada",
                    "key" => 5,
                    "id" => 6
                ],
                [
                    "name" => "Atropello",
                    "key" => 6,
                    "id" => 7
                ],
                [
                    "name" => "Caida de ocupante",
                    "key" => 7,
                    "id" => 8
                ],
                [
                    "name" => "Otro",
                    "key" => 8,
                    "id" => 9
                ]
                ],
            "data" => []

        ];

        $timeInterval = 1;

        $days = [
            "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"
        ];

        $daysGraphic = [
            "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"
        ];

        $criminalacts = DataDitra::all()->count();

        foreach($ProbabilisticData['types'] as $type){

            $criminalactType = DataDitra::where('indicator', $type['id'])->count();

            $probabilidadActual = ($criminalacts > 0) ? ($criminalactType / $criminalacts) * 100 : 0;

            $probabilidadFutura = $this->calculatePoissonProbability($probabilidadActual, $timeInterval);

            $accidentesPorDiaSemana = DataDitra::select(
                \DB::raw('extract(dow from occurrence_date) as day_of_week'),
                \DB::raw('count(*) as count')
            )->where('indicator', '=', $type['id'])
                ->groupBy('day_of_week')
                ->get();

            $diaSemanaMasOcurrencias = DataDitra::where('indicator', '=', $type['id'])
                ->groupBy('day')
                ->orderByRaw('COUNT(*) DESC')
                ->pluck('day')
                ->first();

            $horaMasOcurrencias = DataDitra::where('indicator', '=', $type['id'])
                ->groupBy('hour')
                ->orderByRaw('COUNT(*) DESC')
                ->pluck('hour')
                ->first();


            // Inicializar la estructura del JSON
            $jsonData = [
                "series" => array_fill(0, count($daysGraphic), 0),
                "labels" => $daysGraphic
            ];


            // Llenar la información en el JSON
            foreach ($accidentesPorDiaSemana as $count) {
                $dayIndex = (int)$count->day_of_week;
                $jsonData["series"][$dayIndex] = ($count->count / $criminalactType) * 100;
            }

            $data = [
                "infoData" => "*Datos tomados de una sabana de incidentes del año 2018 a 2023*",
                "probability" => [$probabilidadActual, $probabilidadFutura],
                "graphs" => [ [
                        "horaMasOcurrencias" => $horaMasOcurrencias,
                        "diaSemanaMasOcurrencias" => $diaSemanaMasOcurrencias,
                        "title" => $type['name'],
                        "yaxis" => "Porcentaje de ocurrencias " . $type['name'],
                        "series" => $jsonData["series"],
                        "labels" => $jsonData["labels"],
                        "type" => "bar"]

                ]
            ];

            array_push($ProbabilisticData['data'], $data);
        }

        return $ProbabilisticData;
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
