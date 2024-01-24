<?php

namespace App\Http\Controllers\Viper\Strategies;

use App\DTOs\Viper\ProjectMarker\GeometryDTO;
use App\DTOs\Viper\ProjectMarker\ProjectMarkerDTO;
use App\Models\Viper\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function allTable(Request $request)
    {

    }

    public function getOne($id)
    {

    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function storeMax(Request $request)
    {

    }
}
