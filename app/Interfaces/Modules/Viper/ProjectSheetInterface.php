<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ProjectSheetInterface {

    public function createNewProjectSheet(Collection $projectSheet): Collection;

    public function updateProjectSheet(Collection $projectSheet, int $id): Collection;

    public function getProjectSheetByPhase(int $phaseId): Collection;

    public function getProjectSheet(int $id): Collection;

    public function deleteProjectSheet(int $id): Collection;
}
