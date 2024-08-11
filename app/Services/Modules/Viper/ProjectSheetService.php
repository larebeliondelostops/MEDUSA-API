<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProjectSheetInterface;
use App\Interfaces\Modules\Viper\FolderInterface;
use App\Models\Modules\Viper\ProjectSheet;
use Exception;

class ProjectSheetService implements ProjectSheetInterface{

    private FolderInterface $folderInterface;

    public function __construct(FolderInterface $folderInterface)
    {
        $this->folderInterface = $folderInterface;
    }
    
    public function createNewProjectSheet(Collection $projectSheet): Collection
    {
        $this->folderInterface->getFolderByNames($projectSheet['location']);
        $newProjectSheet = new ProjectSheet($projectSheet->toArray());
        $newProjectSheet->save();
        
        return collect($newProjectSheet);
    }

    public function updateProjectSheet(Collection $projectSheet, int $id): Collection
    {
        $projectSheetUpdate = ProjectSheet::findOrFail($id);
        $projectSheetUpdate->fill($projectSheet->toArray());
        $this->folderInterface->getFolderByNames($projectSheetUpdate->location);

        $projectSheetUpdate->save();
        
        return collect($projectSheetUpdate);
    }

    public function getProjectSheetByPhase(int $phaseId): Collection
    {
        $projectSheetGot = ProjectSheet::where('phase_id', $phaseId)->get();
    
        $projectSheets = $projectSheetGot->transform(
            function (ProjectSheet $projectSheet)
            {
                return collect($projectSheet);
            }
        );
        return collect($projectSheets);
    }

    public function getProjectSheet(int $id): Collection
    {
        $projectSheet = ProjectSheet::findOrFail($id);
        
        return collect($projectSheet);
    }

    public function deleteProjectSheet(int $id): Collection
    {
        $projectSheet = ProjectSheet::findOrFail($id);
        $projectSheet->delete();

        return collect($projectSheet);
    }
}
