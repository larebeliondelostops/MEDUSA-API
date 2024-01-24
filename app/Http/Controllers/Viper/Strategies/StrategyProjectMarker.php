<?php

namespace App\Http\Controllers\Viper\Strategies;

use App\DTOs\Viper\ProjectMarker\GeometryDTO;
use App\DTOs\Viper\ProjectMarker\ProjectMarkerDTO;
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
        $projectsGot = Project::with('location')->get();
        if ($projectsGot->isEmpty()) return response()->json([]);

        $projectsGot->transform(
            function ($project)
            {
                return new ProjectMarkerDTO(
                    [
                        'markerType' => 100,
                        'id' => $project->location->id,
                        'geometry' => new GeometryDTO (
                            [
                                'type' => $project->location->type,
                                'coordinates' => [
                                    (float)$project->location->latitude,
                                    (float)$project->location->longitude
                                ]
                            ]
                        )
                    ]
                );
            }
        );

        return response()->json($projectsGot->toArray());
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
                    'subestado' => $location->project->substate->name
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
