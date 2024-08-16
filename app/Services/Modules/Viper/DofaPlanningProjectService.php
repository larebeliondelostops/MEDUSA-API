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
        $dofaPlanningProject = DofaPlanningProject::where('project_id', $projectId)
            ->with('dofaPlanning')
            ->get();
        

        $grouped = $dofaPlanningProject->groupBy(function ($item) {
            return explode('.', $item->dofaPlanning->item)[0];
        });
    

        $buildHierarchy = function ($items, $parentItem = null) use (&$buildHierarchy) {

            $children = $items->filter(function ($item) use ($parentItem) {
                if ($parentItem === null) {
                    return strpos($item->dofaPlanning->item, '.') === false;
                } else {
                    $parentParts = explode('.', $parentItem->dofaPlanning->item);
                    $currentParts = explode('.', $item->dofaPlanning->item);
                    return count($currentParts) === count($parentParts) + 1
                        && strpos($item->dofaPlanning->item, $parentItem->dofaPlanning->item . '.') === 0;
                }
            });
    

            return $children->map(function ($child) use ($items, $buildHierarchy) {
                $child->subDofaPlanningProject = $buildHierarchy($items, $child);
                return $child;
            })->values();
        };
    
        $result = $buildHierarchy($dofaPlanningProject);
    
        return collect($result);
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