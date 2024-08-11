<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\DofaPlanningProjectInterface;
use App\Models\Modules\Viper\DofaPlanningProject;
use Exception;


class DofaPlanningProjectService implements DofaPlanningProjectInterface{

    public function createNewDofaPlanningProject(Collection $dofaPlanningProject): Collection
    {
        $newDofaPlanningProject = new DofaPlanningProject($dofaPlanningProject->toArray());
        $newDofaPlanningProject->save();
        return collect($newDofaPlanningProject);
    }

    public function updateDofaPlanningProject(Collection $dofaPlanningProject, int $id): Collection
    {
        $dofaPlanningProjectUpdate = DofaPlanningProject::findOrFail($id);
        $dofaPlanningProjectUpdate->fill($dofaPlanningProject->toArray());
        $dofaPlanningProjectUpdate->save();
        return collect($dofaPlanningProjectUpdate);
    }

    public function getDofaPlanningProjectByProject(String $projectId): Collection
    {
        $dofaPlanningProject = DofaPlanningProject::with('dofaPlanning')->where('project_id', $projectId)->get();
        
        $dofaPlanningProject->makeHidden('dofa_planning_id');

        return collect($dofaPlanningProject);
    }

    public function getDofaPlanningProject(int $id): Collection
    {
        $dofaPlanningProject = DofaPlanningProject::findOrFail($id);
        return collect($dofaPlanningProject);
    }

    public function deleteDofaPlanningProject(int $id): Collection
    {
        $dofaPlanningProject = DofaPlanningProject::findOrFail($id);
        $dofaPlanningProject->delete();

        return collect($dofaPlanningProject);
    }
}