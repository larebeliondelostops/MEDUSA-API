<?php

namespace App\Services\Viper;
use App\Interfaces\Viper\ProjectInterface;
use App\Interfaces\Viper\ProjectMarkerInterface;
use App\Models\Viper\Project;


class ProjectMarkerService implements ProjectMarkerInterface
{
    public function getAllProjectsMarkers() : array
    {
        $projectsGot = Project::with('location')->all();
        $projectsGot->transform(
            function ($project)
            {

            }
        );

        return $projectsGot->toArray();
    }
}
