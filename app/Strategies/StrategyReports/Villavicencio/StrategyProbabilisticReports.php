<?php

namespace App\Strategies\StrategyReports\Villavicencio;

use App\Models\CriminalActs;
use Illuminate\Http\Request;


class StrategyProbabilisticReports
{
    //reportes de actos delictivos
    public function StatisticsByIndicatorAndGrid(Request $request)
    {

        // Obtener la hora con más ocurrencias de delitos históricamente por indicador y cuadrícula
        $horaMasOcurrencias = CriminalActs::where('IndicatorId', '=', $request->indicatorId)
            ->where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('time')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('time')
            ->first();

        // Obtener el día de la semana con más ocurrencias de delitos históricamente por indicador y cuadrícula
        $diaSemanaMasOcurrencias = CriminalActs::where('IndicatorId', '=', $request->indicatorId)
            ->where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('day')
            ->first();

        // Definir todos los días de la semana
        $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

        // Obtener cantidad de delitos por día de la semana
        $delitosPorDiaSemana = CriminalActs::where('IndicatorId', '=', $request->indicatorId)
            ->where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
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

    public function StatisticsGeneral(Request $request)
    {
        // Obtener la hora con más ocurrencias de delitos históricamente por cuadrícula general
        $horaMasOcurrencias = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('time')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('time')
            ->first();

        // Obtener el día de la semana con más ocurrencias de delitos históricamente por cuadrícula general
        $diaSemanaMasOcurrencias = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('day')
            ->first();

        // Obtener el delito más frecuente
        $delitoMasFrecuente = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('crime')
            ->orderByRaw('COUNT(*) DESC')
            ->pluck('crime')
            ->first();

        // Obtener el delito menos frecuente
        $delitoMenosFrecuente = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->groupBy('crime')
            ->orderByRaw('COUNT(*) ASC')
            ->pluck('crime')
            ->first();

        // Obtener todos los días de la semana en mayúsculas
        $diasSemana = ["LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO", "DOMINGO"];

        // Obtener cantidad de delitos por día de la semana
        $delitosPorDiaSemana = CriminalActs::where('ProbabilisticGridId', '=', $request->ProbabilisticGridId)
            ->selectRaw('day, COUNT(*) as count')
            ->groupBy('day')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // Crear una colección con todos los días de la semana y sus recuentos
        $porcentajePorDiaSemana = collect($diasSemana)->map(function ($dia) use ($delitosPorDiaSemana) {
            $delitos = $delitosPorDiaSemana->firstWhere('day', $dia);

            return [
                'day' => $dia,
                'percentage' => $delitos ? ($delitos->count / $delitosPorDiaSemana->sum('count')) * 100 : 0,
            ];
        });

        return response()->json(['horaMasOcurrencias' => $horaMasOcurrencias, 'diaSemanaMasOcurrencias' => $diaSemanaMasOcurrencias, 'delitoMasFrecuente' => $delitoMasFrecuente, 'delitoMenosFrecuente' => $delitoMenosFrecuente, 'porcentajePorDiaSemana' => $porcentajePorDiaSemana]);
    }
}
