<?php

namespace App\Strategies\StrategyProbabilistic\Villavicencio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\ProbabilisticGrid;
use App\Models\ProbabilisticGridIpat;
use App\Models\Ipats;
use App\Strategies\Interface\Villavicencio\ProbabilisticInterface;

class StrategyProbabilisticMovility implements ProbabilisticInterface
{

    public function GetIndicators()
    {

        $indicators = Ipats::select(
                \DB::raw('count(*) as count'),
                \DB::raw("id_agent")
                )->groupBy('id_agent')
                ->get();

        $dataIndicators = [];

        foreach ($indicators as $indicator) {
            $dataIndicators[] = [
                "id" => $indicator->id_agent,
                "name" => $indicator->id_agent,
                "description" => '...',
            ];
        }


        return response()->json($dataIndicators, 200, [], JSON_NUMERIC_CHECK);

        $tabs = [
            [
                'id'=> 1,
                'name' => 'Accidentes',
                'description' => '.'
            ]
        ];

        return Response::json($tabs, 200, [], JSON_PRETTY_PRINT);
    }

    public function obtenerCuadriculaProbabilisticaPorIndicador($id)
    {

        return 1;
    }

    public function obtenerCuadriculaProbabilisticaGeneral()
    {
        $data = ProbabilisticGridIpat::all();
        $resultData = [
            "type" => "FeatureCollection",
            "features" => []
        ];

        foreach ($data as $grid) {
            $coordinates = json_decode($grid->coordinates, true);

            $feature = [
                "type" => "Feature",
                "properties" => [
                    "id" => $grid->id,
                    "CurrentPercentage" => $grid->ActualStateAccidents,
                    "FuturePercentage" => $grid->FutureStateAccidents
                ],
                "geometry" => [
                    "type" => $grid->type,
                    "coordinates" => [$coordinates]
                ]
            ];
            $resultData["features"][] = $feature;
        }

        return response()->json($resultData, 200, [], JSON_NUMERIC_CHECK);
    }


    // public function getProbabilisticData(Request $request)
    // {
    //     $ProbabilisticData = [
    //         "types" => [
    //             [
    //                 "name" => "IPATS",
    //                 "key" => 0,
    //                 "id" => 1
    //             ]
    //             ],
    //         "data" => []

    //     ];

    //     $timeInterval = 1;

    //     $days = [
    //         "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"
    //     ];

    //     $daysGraphic = [
    //         "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"
    //     ];

    //     $Ipats = Ipats::all()->count();

    //         $Ipatgrid = Ipats::where('probabilisticgrid_id', $request->ProbabilisticGridId)
    //                   ->where('probabilisticgrid_id', '!=', '1')
    //                   ->count();

    //         // Obtener datos de la base de datos por dia de la semana
    //         $IpatsCount = Ipats::select(
    //             \DB::raw('count(*) as count'),
    //             \DB::raw('extract(dow from date_ipat) as day'),
    //         )
    //             ->where('probabilisticgrid_id', $request->ProbabilisticGridId)
    //             ->where('probabilisticgrid_id', '!=', '1')
    //             ->groupBy('day')
    //             ->get();

    //         //dia de mas ocurrencias
    //         $day = Ipats::select(
    //             \DB::raw('count(*) as count'),
    //             \DB::raw("DATE_PART('dow', date_ipat) as day")
    //         )
    //             ->where('probabilisticgrid_id', $request->ProbabilisticGridId)
    //             ->where('probabilisticgrid_id', '!=', '1')
    //             ->groupBy('day')
    //             ->orderBy('count', 'desc')
    //             ->first();

    //         // Inicializar la estructura del JSON
    //         $jsonData = [
    //             "series" => array_fill(0, count($daysGraphic), 0),
    //             "labels" => $daysGraphic
    //         ];

    //         // Llenar la información en el JSON
    //         foreach ($IpatsCount as $count) {
    //             $dayIndex = (int)$count->day; // Restamos 1 ya que los meses en PHP son indexados desde 0
    //             $jsonData["series"][$dayIndex] = ($count->count / $Ipatgrid) * 100;
    //         }

    //         $data = [
    //             "infoData" => "...",
    //             "graphs" => [ [
    //                     "horaMasOcurrencias" => NULL,
    //                     "diaSemanaMasOcurrencias" => $day && $day->day !== null ? $days[(int)$day->day] : null,
    //                     "title" => "IPATS",
    //                     "yaxis" => "Porcentaje de accidentes",
    //                     "series" => $jsonData["series"],
    //                     "labels" => $jsonData["labels"],
    //                     "type" => "bar"]

    //             ]
    //         ];

    //         array_push($ProbabilisticData['data'], $data);

    //     return $ProbabilisticData;
    // }

    public function getProbabilisticData(Request $request)
    {

        // Obtener el día de la semana con más ocurrencias de delitos históricamente por indicador y cuadrícula
        $diaSemanaMasOcurrencias = Ipats::select(
                \DB::raw('count(*) as count'),
                \DB::raw("DATE_PART('dow', date_ipat) as day")
            )
                ->where('probabilisticgrid_id', $request->ProbabilisticGridId)
                ->where('id_agent', $request->indicatorId)
                ->where('probabilisticgrid_id', '!=', '1')
                ->groupBy('day')
                ->orderBy('count', 'desc')
                ->pluck('day')
                ->first();

        // Definir todos los días de la semana
        $diasSemana = ['DOMINGO', 'LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO'];

        $numeroDiaSemana = [0, 1, 2, 3, 4, 5, 6];

        // $diaSemanaMasOcurrencias = $diasSemana[$diaSemanaMasOcurrencias];

        // Obtener cantidad de delitos por día de la semana
        $delitosPorDiaSemana = Ipats::select(
                \DB::raw('count(*) as count'),
                \DB::raw('extract(dow from date_ipat) as day'),
            )
                ->where('probabilisticgrid_id', $request->ProbabilisticGridId)
                ->where('id_agent', $request->indicatorId)
                ->where('probabilisticgrid_id', '!=', '1')
                ->groupBy('day')
                ->get();

        $diaMasOcurrencias = $diaSemanaMasOcurrencias ? $diasSemana[$diaSemanaMasOcurrencias] : null;

        // Crear una colección para almacenar los resultados
        $porcentajePorDiaSemana = collect();

        // Iterar sobre todos los días de la semana
        foreach ($numeroDiaSemana as $dia) {
            $delitos = $delitosPorDiaSemana->firstWhere('day', $dia);

            $porcentaje = [
                'day' => $diasSemana[$dia],
                'percentage' => $delitos ? ($delitos->count / $delitosPorDiaSemana->sum('count')) * 100 : 0,
            ];

            $porcentajePorDiaSemana->push($porcentaje);
        }

        return response()->json(['horaMasOcurrencias' => null, 'diaSemanaMasOcurrencias' => $diaMasOcurrencias, 'porcentajePorDiaSemana' => $porcentajePorDiaSemana]);
    }
}
