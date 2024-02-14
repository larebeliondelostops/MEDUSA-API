<?php

namespace App\Http\Controllers\Viper\Strategies;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\ProjectMarker\GeometryDTO;
use App\DTOs\Viper\ProjectMarker\ProjectMarkerPointDTO;
use App\Models\Viper\Location;
use App\Models\Viper\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Exception;

class StrategyProjectMarker
{
    public static function all()
    {
        $projectMarkets = [];
        $projectsGot = Project::with('locations.coordinate')->get();
        foreach($projectsGot as $project)
        {
            foreach($project['locations']['coordinate'] as $coordinates)
            {
                $coordinatesDTO = new CoordinatesRequestDTO($coordinates);
                $projectMarket = new ProjectMarkerPointDTO(
                    [
                        'id' => $coordinatesDTO->id,
                        'geometry' => [
                                'type' => $coordinatesDTO->type,
                                'coordinates' => [
                                    (float)$coordinatesDTO->latitude,
                                    (float)$coordinatesDTO->longitude
                                ]
                        ]
                    ]
                );
                $projectMarkets[] = $projectMarket;
            }
        }

        return $projectMarkets;
    }

    public static function getInfoPoint($uuid)
    {
        $location = Location::with('project', 'project.state', 'project.state', 'project.substate')->findOrFail($uuid);
        try {
            $projectInfo = [
                'title' => $location->project->name,
                'properties' => [
                    'bpin' => $location->project->bpin,
                    'sector' => $location->project->sector->name,
                    'estado' => $location->project->state->name,
                    'subestado' => $location->project->substate->name,
                    'entidad ejecutora' => $location->responsible_entity,
                    'valor requerido' => $location->reqyested_valued,
                    'valor ejecutado' => $location->executed_value,
                    'fecha de aprobación' => $location->execution_approval_date,
                    'fecha de finalización' => $location->completion_date,
                    'fecha de ejecución' => $location->start_date_execution_phase
                ]
            ];

            return response()->json($projectInfo, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'.$exception->getMessage()
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function allTable(Request $request)
    {
        return response()->json([]);
    }

    public function getOne($id)
    {
        return response()->json([]);
    }

    public function store(Request $request)
    {
        return response()->json([]);
    }

    public function update(Request $request, $id)
    {
        return response()->json([]);
    }

    public function destroy($id)
    {
        return response()->json([]);
    }

    public function storeMax(Request $request)
    {
        return response()->json([]);
    }
}
