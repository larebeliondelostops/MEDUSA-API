<?php

namespace App\Strategies\StrategyProbabilistic\Villavicencio;

use Illuminate\Http\Request;
use App\Models\ProbabilisticGrid;
use App\Models\CriminalActs;
use App\Models\Indicator;
use App\Strategies\Interface\Villavicencio\ProbabilisticInterface;

class StrategyProbabilisticCrimes implements ProbabilisticInterface
{

    public function GetIndicators()
    {
        $indicators = Indicator::all();

        $dataIndicators = [];

        foreach ($indicators as $indicator) {
            $dataIndicators[] = [
                "id" => $indicator->id,
                "name" => $indicator->name,
                "description" => $indicator->description,
            ];
        }


        return response()->json($dataIndicators, 200, [], JSON_NUMERIC_CHECK);
    }

    public function obtenerCuadriculaProbabilisticaPorIndicador($id)
    {
        $data = ProbabilisticGrid::all();
        $resultData = [
            "type" => "FeatureCollection",
            "features" => []
        ];
        if ($id == 1) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);

                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->actual_state_personal_injuries,
                        "FuturePercentage" => $grid->future_state_personal_injuries
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 2) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);

                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->actual_state_theft_residences,
                        "FuturePercentage" => $grid->future_state_theft_residences
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 3) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);

                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->ActualStateTheftCommerce,
                        "FuturePercentage" => $grid->FutureStateTheftCommerce
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 4) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);

                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->ActualStateTheftAutomotive,
                        "FuturePercentage" => $grid->FutureStateTheftAutomotive
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 5) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);

                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->ActualStateTheftMotorcycles,
                        "FuturePercentage" => $grid->FutureStateTheftMotorcycles
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 6) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);

                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->ActualStateTheftFinancialEntities,
                        "FuturePercentage" => $grid->FutureStateTheftFinancialEntities
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 7) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);

                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->ActualStateHomicide,
                        "FuturePercentage" => $grid->FutureStateHomicide
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 8) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);

                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->ActualStateKidnapping,
                        "FuturePercentage" => $grid->FutureStateKidnapping
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 9) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);
                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->ActualStateExtortion,
                        "FuturePercentage" => $grid->FutureStateExtortion
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }
        if ($id == 10) {
            foreach ($data as $grid) {
                $coordinates = json_decode($grid->coordinates, true);
                $feature = [
                    "type" => "Feature",
                    "properties" => [
                        "id" => $grid->id,
                        "CurrentPercentage" => $grid->ActualStateTerrorism,
                        "FuturePercentage" => $grid->FutureStateTerrorism
                    ],
                    "geometry" => [
                        "type" => $grid->type,
                        "coordinates" => [$coordinates]
                    ]
                ];
                $resultData["features"][] = $feature;
            }
        }

        return response()->json($resultData, 200, [], JSON_NUMERIC_CHECK);
    }

    public function obtenerCuadriculaProbabilisticaGeneral()
    {
        $data = ProbabilisticGrid::all();
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
                    "CurrentPercentage" => $grid->actual_state_average,
                    "FuturePercentage" => $grid->future_state_average
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

   
    //reportes de actos delictivos
    public function getProbabilisticData(Request $request)
    {

        // Obtener la hora con más ocurrencias de delitos históricamente por indicador y cuadrícula
        $horaMasOcurrencias = CriminalActs::where('indicator_id', '=', $request->indicatorId)
            ->where('probabilistic_grid_id', '=', $request->ProbabilisticGridId)
            ->groupBy('time')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('time')
            ->first();

        // Obtener el día de la semana con más ocurrencias de delitos históricamente por indicador y cuadrícula
        $diaSemanaMasOcurrencias = CriminalActs::where('indicator_id', '=', $request->indicatorId)
            ->where('probabilistic_grid_id', '=', $request->ProbabilisticGridId)
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('day')
            ->first();

        // Definir todos los días de la semana
        $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

        // Obtener cantidad de delitos por día de la semana
        $delitosPorDiaSemana = CriminalActs::where('indicator_id', '=', $request->indicatorId)
            ->where('probabilistic_grid_id', '=', $request->ProbabilisticGridId)
            ->selectRaw('day, COUNT(*) as count')
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // Crear una colección para almacenar los resultados
        $porcentajePorDiaSemana = collect();

        // Iterar sobre todos los días de la semana
        foreach ($diasSemana as $dia) {
            $delitos = $delitosPorDiaSemana->firstWhere('day', $dia);

            $porcentaje = [
                'day' => $dia,
                'percentage' => $delitos ? ($delitos->count / $delitosPorDiaSemana->sum('count')) * 100 : 0,
            ];

            $porcentajePorDiaSemana->push($porcentaje);
        }

        return response()->json(['horaMasOcurrencias' => $horaMasOcurrencias, 'diaSemanaMasOcurrencias' => $diaSemanaMasOcurrencias, 'porcentajePorDiaSemana' => $porcentajePorDiaSemana]);
    }
}
