<?php

namespace App\Strategies\StrategyProbabilistic\Villavicencio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\ProbabilisticGrid;
use App\Models\ProbabilisticGridIpat;
use App\Models\Ipats;
use App\Models\Indicator;
use App\Strategies\Interface\Villavicencio\ProbabilisticInterface;

class StrategyProbabilisticMovility implements ProbabilisticInterface
{

    public function GetIndicators()
    {
        $indicators = Indicator::where('id','>',11)->get();

        $dataIndicators = [];

        foreach ($indicators as $indicator) {
            $dataIndicators[] = [
                "id" => $indicator->id,
                "name" => $indicator->Name,
                "description" => $indicator->Description,
            ];
        }


        return response()->json($dataIndicators, 200, [], JSON_NUMERIC_CHECK);
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

    public function getProbabilisticData(Request $request)
    {

        // Obtener el día de la semana con más ocurrencias de delitos históricamente por indicador y cuadrícula
        $diaSemanaMasOcurrencias = Ipats::select(
                \DB::raw('count(*) as count'),
                \DB::raw("DATE_PART('dow', date_ipat) as day")
            )
                ->where('probabilistic_grid_id', $request->ProbabilisticGridId)
                ->where('indicator', $request->indicatorId)
                ->where('probabilistic_grid_id', '!=', '1')
                ->groupBy('day')
                ->orderBy('count', 'desc')
                ->pluck('day')
                ->first();   // //reportes de actos ipats
    // public function getProbabilisticData(Request $request)
    // {

    //     // Obtener la hora con más ocurrencias de delitos históricamente por indicador y cuadrícula
    //     $horaMasOcurrencias = Ipats::where('indicator', '=', $request->indicatorId)
    //         ->where('probabilistic_grid_id', '=', $request->ProbabilisticGridId)
    //         ->groupBy('time')
    //         ->orderByRaw('COUNT(*) DESC')
    //         ->pluck('time')
    //         ->first();

    //     // Obtener el día de la semana con más ocurrencias de delitos históricamente por indicador y cuadrícula
    //     $diaSemanaMasOcurrencias = Ipats::where('indicator', '=', $request->indicatorId)
    //         ->where('probabilistic_grid_id', '=', $request->ProbabilisticGridId)
    //         ->groupBy('day')
    //         ->orderByRaw('COUNT(*) DESC')
    //         ->pluck('day')
    //         ->first();

    //     // Definir todos los días de la semana
    //     $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

    //     // Obtener cantidad de delitos por día de la semana
    //     $delitosPorDiaSemana = Ipats::where('indicator', '=', $request->indicatorId)
    //         ->where('probabilistic_grid_id', '=', $request->ProbabilisticGridId)
    //         ->selectRaw('day, COUNT(*) as count')
    //         ->groupBy('day')
    //         ->orderByRaw('COUNT(*) DESC')
    //         ->get();

    //     // Crear una colección para almacenar los resultados
    //     $porcentajePorDiaSemana = collect();

    //     // Iterar sobre todos los días de la semana
    //     foreach ($diasSemana as $dia) {
    //         $delitos = $delitosPorDiaSemana->firstWhere('day', $dia);

    //         $porcentaje = [
    //             'day' => $dia,
    //             'percentage' => $delitos ? ($delitos->count / $delitosPorDiaSemana->sum('count')) * 100 : 0,
    //         ];

    //         $porcentajePorDiaSemana->push($porcentaje);
    //     }

    //     return response()->json(['horaMasOcurrencias' => $horaMasOcurrencias, 'diaSemanaMasOcurrencias' => $diaSemanaMasOcurrencias, 'porcentajePorDiaSemana' => $porcentajePorDiaSemana]);
    // }

        // Definir todos los días de la semana
        $diasSemana = ['DOMINGO', 'LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO'];

        $numeroDiaSemana = [0, 1, 2, 3, 4, 5, 6];

        // $diaSemanaMasOcurrencias = $diasSemana[$diaSemanaMasOcurrencias];

        // Obtener cantidad de delitos por día de la semana
        $delitosPorDiaSemana = Ipats::select(
                \DB::raw('count(*) as count'),
                \DB::raw('extract(dow from date_ipat) as day'),
            )
                ->where('probabilistic_grid_id', $request->ProbabilisticGridId)
                ->where('indicator', $request->indicatorId)
                ->where('probabilistic_grid_id', '!=', '1')
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