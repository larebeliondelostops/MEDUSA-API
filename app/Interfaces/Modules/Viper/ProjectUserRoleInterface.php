<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ProjectUserRoleInterface {

    public function createNewProjectUserRole(Collection $projectUserRole): Collection;

    public function updateProjectUserRole(Collection $projectUserRole, int $id): Collection;

    public function getAllProjectUserRoleByProject(string $projectId): Collection;

    public function getProjectUserRole(int $id): Collection;

    public function deleteProjectUserRole(int $id): Collection;
    
    public function getRoleByProjectUser(string $projectId, int $userId): ?Collection;
}
