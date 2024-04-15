<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ProjectUserRoleInterface {

    public function createNewProjectUserRole(Collection $projectUserRole): Collection;

    public function updateProjectUserRole(Collection $projectUserRole, int $id): Collection;

    public function getAllProjectUserRoleByProject(int $projectId): Collection;

    public function getProjectUserRole(int $id): Collection;

    public function deleteProjectUserRole(int $id): Collection;
    
    public function getRoleByProjectUser(int $projectId, int $userId): ?Collection;
}
