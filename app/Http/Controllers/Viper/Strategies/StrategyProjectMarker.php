<?php

namespace App\Http\Controllers\Viper\Strategies;

use App\DTOs\Viper\ProjectMarker\GeometryDTO;
use App\DTOs\Viper\ProjectMarker\ProjectMarkerDTO;
use App\Models\Viper\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StrategyProjectMarker
{
    public static function all()
    {
        $projectsGot = Project::with('location')->get();
        $projectsGot->transform(
            function ($project)
            {
                return new ProjectMarkerDTO(
                    [
                        'markerType' => 1,
                        'id' => $project->location->id,
                        'geometry' => new GeometryDTO (
                            [
                                'type' => $project->location->type,
                                'coordinates' => [
                                        $project->location->latitude,
                                        $project->location->longitude
                                    ]
                            ]
                        )
                    ]
                );
            }
        );
        return response()->json([
            $projectsGot->toArray()
        ], Response::HTTP_OK);
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
