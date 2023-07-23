<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProbabilisticGrid;

class ProbabilisticController extends Controller
{
    public function obtenerCuadriculaProbabilistica()
    {
        $data = ProbabilisticGrid::all();
        $resultData = [
            "type" => "FeatureCollection",
            "features" => []
        ];

        foreach ($data as $grid) {
            $feature = [
                "type" => "Feature",
                "properties" => [
                    "id" => $grid->id,
                    "types" => [
                        "PersonalInjuries" => [$grid->ActualStatePersonalInjuries, $grid->FutureStatePersonalInjuries],
                        "TheftResidences" => [$grid->ActualStateTheftResidences, $grid->FutureStateTheftResidences],
                        "TheftCommerce" => [$grid->ActualStateTheftCommerce, $grid->FutureStateTheftCommerce],
                        "TheftAutomotive" => [$grid->ActualStateTheftAutomotive, $grid->FutureStateTheftAutomotive],
                        "TheftMotorcycles" => [$grid->ActualStateTheftMotorcycles, $grid->FutureStateTheftMotorcycles],
                        "TheftFinancialEntities" => [$grid->ActualStateTheftFinancialEntities, $grid->FutureStateTheftFinancialEntities],
                        "Homicide" => [$grid->ActualStateHomicide, $grid->FutureStateHomicide],
                        "Kidnapping" => [$grid->ActualStateKidnapping, $grid->FutureStateKidnapping],
                        "Extortion" => [$grid->ActualStateExtortion, $grid->FutureStateExtortion],
                        "Terrorism" => [$grid->ActualStateTerrorism, $grid->FutureStateTerrorism]
                    ],
                    "ActualState" => $grid->ActualStateAverage/10,
                    "FutureState" => $grid->FutureStateAverage/10,
                    "CurrentPercentage" => $grid->ActualStateAverage,
                    "FuturePercentage" => $grid->FutureStateAverage
                ],
                "geometry" => [
                    "type" => $grid->type,
                    "coordinates" => [$grid->coordinates]
                ]
            ];
            $resultData["features"][] = $feature;
        }

        return response()->json($resultData, 200, [], JSON_NUMERIC_CHECK);
    }
}
