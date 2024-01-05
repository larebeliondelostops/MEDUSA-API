<?php

namespace App\Services\Viper;

use App\DTOs\Viper\ProjectDTO;
use App\DTOs\Viper\ProjectSummaryDTO;
use App\Interfaces\Viper\ProjectInterface;
use App\Models\Viper\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProjectService implements ProjectInterface
{
    public function createNewProject(ProjectDTO $projectDTO) : void 
    {    
        $project = new Project();
        $project->fill($projectDTO->toArray());
        $project->save();
    }

    public function updateProject(ProjectDTO $projectDTO, string $bpin) : void
    {
        $project = Project::findOrFail($bpin);
        $data = $projectDTO->toArray();
        $project->fill($data);
        $project->save();
    }

    public function getAllProjectsPaginated(int $perPage, ?string $name): LengthAwarePaginator
    {
        $query = Project::query();

        if (!is_null($name))  
        {
            $query->where('name', 'LIKE', '%'.$name.'%');
        }
    
        $paginatedProjects = $query->paginate($perPage);
    
        $paginatedProjects->getCollection()->transform(function ($project) {
            return new ProjectSummaryDTO($project->toArray());
        });
    
        return $paginatedProjects;
    }

    public function getProjectByBPIN(string $bpin) : ProjectDTO
    {
        $project = Project::find($bpin);
        return new ProjectDTO($project->toArray());
    }
}