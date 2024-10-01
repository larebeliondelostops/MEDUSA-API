<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ditra\Indicator;
use App\Strategies\StrategiesProbabilistic\Villavicencio\StrategyProbabilisticCrimes;
use App\Values\ProbabilisticValuesDitra;
use App\Values\ProbabilisticValuesVillavicencio;
use Illuminate\Support\Facades\Response;
use App\Models\Villavicencio\CriminalActs;

class ProbabilisticController extends Controller
{

    public function GetIndicators(Request $request)
    {

        try {
            $key = $request->key;

            $strategy = ProbabilisticValuesVillavicencio::STRATEGY[$key];

            return (new $strategy)->GetIndicators();
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
        // $Probabilistic = new StrategyProbabilisticCrimes();

        // $dataIndicators = $Probabilistic->GetIndicators();

        // return $dataIndicators;
    }

    public function obtenerCuadriculaProbabilisticaPorIndicador($id)
    {
        $Probabilistic = new StrategyProbabilisticCrimes();

        $data = $Probabilistic->obtenerCuadriculaProbabilisticaPorIndicador($id);

        return $data;
    }

    public function obtenerCuadriculaProbabilisticaGeneral(Request $request)
    {
        try {
            $key = $request->key;

            $strategy = ProbabilisticValuesVillavicencio::STRATEGY[$key];

            return (new $strategy)->obtenerCuadriculaProbabilisticaGeneral();
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
        // $Probabilistic = new StrategyProbabilisticCrimes();

        // $data = $Probabilistic->obtenerCuadriculaProbabilisticaGeneral();

        // return $data;
    }

    public function getTaps()
    {
        // $indicators = Indicator::all();

        // $dataIndicators = [];

        // foreach ($indicators as $indicator) {
        //     $dataIndicators[] = [
        //         "name" => $indicator->name,
        //         "key" => $indicator->id,
        //     ];
        // }

        // return response()->json($dataIndicators, 200, [], JSON_NUMERIC_CHECK);
        $tabs = [
            [
                'name' => 'Accidentes',
                'key' => 1
            ]
        ];

        return Response::json($tabs, 200, [], JSON_PRETTY_PRINT);
    }

    public function type(Request $request)
    {
        try {
            $key = $request->key;
            $strategy = ProbabilisticValuesDitra::STRATEGY[$key];

            $data = (new $strategy)->getProbabilisticData();
            // Asumiendo que $data es un array que puede contener valores INF
            array_walk_recursive($data, function (&$item) {
                if (is_float($item) && is_infinite($item)) {
                    $item = 0; // O cualquier otro valor que consideres adecuado
                }
            });

            return response()->json($data);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    // public function obtenerCuadriculaProbabilisticaGeneralMovilidad()
    // {
    //     $Probabilistic = new StrategyProbabilistic();

    //     $data = $Probabilistic->obtenerCuadriculaProbabilisticaGeneralMovilidad();

    //     return $data;
    // }

    public function obtenerEstadisticasPorCuadricula(Request $request)
    {

        try {
            $key = $request->key;

            $strategy = ProbabilisticValuesVillavicencio::STRATEGY[$key];

            return (new $strategy)->getProbabilisticData($request);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }

        // $Probabilistic = new StrategyProbabilisticCrimes();

        // $data = $Probabilistic->getProbabilisticData($gridId);

        // return $data;
    }

    public function getCriminalActs(Request $request)
    {
        $criminal_acts = CriminalActs::all();

        return $criminal_acts;
    }
}
