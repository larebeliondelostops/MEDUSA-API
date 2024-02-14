<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\ProjectMarker\GeometryDTO;
use App\DTOs\Viper\ProjectMarker\ProjectMarkerPointDTO;
use App\Interfaces\Viper\ProjectMarkerInterface;
use App\Models\Viper\Project;


class ProjectMarkerService implements ProjectMarkerInterface
{
    public function getAllProjectsMarkers() : array
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
                        'geometry' => new GeometryDTO (
                            [
                                'type' => $coordinatesDTO->type,
                                'coordinates' => [
                                    $coordinatesDTO->latitude,
                                    $coordinatesDTO->longitude
                                ]
                            ]
                        )
                    ]
                );
                $projectMarkets[] = $projectMarket;
            }
        }

        return $projectMarkets;

        // $projectsGot->transform(
        //     function ($project)
        //     {
        //         return new ProjectMarkerDTO(
        //             [
        //                 'markerType' => 100,
        //                 'id' => $project->location->id,
        //                 'geometry' => new GeometryDTO (
        //                     [
        //                         'type' => $project->location->type,
        //                         'coordinates' => [
        //                             (float)$project->location->latitude,
        //                             (float)$project->location->longitude
        //                         ]
        //                     ]
        //                 )
        //             ]
        //         );
        //     }
        // );

        // return response()->json($projectsGot->toArray());
    }
}
