<?php

namespace App\Strategies\StrategyProbabilistic\Villavicencio;

use Illuminate\Http\Request;
use App\Models\ProbabilisticGrid;
use App\Models\Indicator;
use App\Strategies\Interface\Villavicencio\ProbabilisticInterface;

class StrategyProbabilistic implements ProbabilisticInterface
{

    public function GetIndicators()
    {
        $indicators = Indicator::all();

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
                        "CurrentPercentage" => $grid->ActualStatePersonalInjuries,
                        "FuturePercentage" => $grid->FutureStatePersonalInjuries
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
                        "CurrentPercentage" => $grid->ActualStateTheftResidences,
                        "FuturePercentage" => $grid->FutureStateTheftResidences
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
                    "CurrentPercentage" => $grid->ActualStateAverage,
                    "FuturePercentage" => $grid->FutureStateAverage
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
}
