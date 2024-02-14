<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ditra\Indicator;
use App\Strategies\StrategyProbabilistic\Villavicencio\StrategyProbabilistic;
use App\Values\ProbabilisticValuesDitra;

class ProbabilisticController extends Controller
{

    public function GetIndicators()
    {

        $Probabilistic = new StrategyProbabilistic();

        $dataIndicators = $Probabilistic->GetIndicators();

        return $dataIndicators;
    }

    public function obtenerCuadriculaProbabilisticaPorIndicador($id)
    {

        $Probabilistic = new StrategyProbabilistic();

        $data = $Probabilistic->obtenerCuadriculaProbabilisticaPorIndicador($id);

        return $data;
    }

    public function obtenerCuadriculaProbabilisticaGeneral()
    {

        $Probabilistic = new StrategyProbabilistic();

        $data = $Probabilistic->obtenerCuadriculaProbabilisticaGeneral();

        return $data;
    }

    public function getTaps()
    {
        $Indicartor = Indicator::all();

        $tabs = [];

        foreach ($Indicartor as $key => $value) {
            $tabs[] = [
                'name' => $value->name,
                'key' => $value->id
            ];
        }

        return $tabs;
    }

    public function type(Request $request)
    {
        try {
            $key = $request->key;

            $strategy = ProbabilisticValuesDitra::STRATEGY[$key];

            return (new $strategy)->getProbabilisticData();
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
