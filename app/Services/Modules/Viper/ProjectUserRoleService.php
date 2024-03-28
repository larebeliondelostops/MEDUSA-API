<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProjectUserRoleInterface;
use App\Models\Modules\Viper\ProjectUserRole;

class ProjectUserRoleService implements ProjectUserRoleInterface {

    public function createNewProjectUserRole(Collection $projectUserRole): Collection
    {
        $newProjectUserRole = new ProjectUserRole($projectUserRole->toArray());
        $newProjectUserRole->save();
        
        return collect($newProjectUserRole);
    }

    public function updateProjectUserRole(Collection $projectUserRole, int $id): Collection
    {
        $projectUserRoleUpdate = ProjectUserRole::findOrFail($id);
        $projectUserRoleUpdate->fill($projectUserRole->toArray());
        $projectUserRoleUpdate->save();
        
        return collect($projectUserRoleUpdate);
    }

    public function getAllProjectUserRoleByProject(int $projectId): Collection
    {
        $projectUserRoleGot = ProjectUserRole::where('project_id', $projectId)->get();
    
        $projectUserRoles = $projectUserRoleGot->transform(
            function (ProjectUserRole $projectUserRole)
            {
                return collect($projectUserRole);
            }
        );
        return collect($projectUserRoles);
    }

    public function getProjectUserRole(int $id): Collection
    {
        $projectUserRole = ProjectUserRole::findOrFail($id);
        
        return collect($projectUserRole);
    }

    public function deleteProjectUserRole(int $id): Collection
    {
        $projectUserRole = ProjectUserRole::findOrFail($id);
        $projectUserRole->delete();

        return collect($projectUserRole);
    }


    public function getRoleByProjectUser(int $projectId, int $userId): ?Collection
    {
        $projectUserRole = ProjectUserRole::where('project_id', $projectId)
                                          ->where('user_id', $userId)
                                          ->first();
    
        if ($projectUserRole === null) {
            return null;
        }
        
        return collect($projectUserRole);
    }
    
    
}
