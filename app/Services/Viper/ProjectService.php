<?php

namespace App\Services\Viper;

use App\DTOs\Viper\ProjectDTO;
use App\Interfaces\Viper\ProjectInterface;
use App\Models\Viper\Project;

class ProjectService implements ProjectInterface
{
    public function createNewProject(ProjectDTO $projectDTO){
        $project = new Project();
        $project->fill($projectDTO->toArray());
        return $project->save();
    }
}