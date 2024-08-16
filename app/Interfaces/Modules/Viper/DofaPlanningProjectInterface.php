<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface DofaPlanningProjectInterface {

    public function createNewDofaPlanningProject(Collection $dofaPlanning): Collection;

    public function updateDofaPlanningProject(Collection $dofaPlanning, int $id): Collection;

    public function getDofaPlanningProjectByProject(String $projectId): Collection;

    public function getDofaPlanningProject(int $id): Collection;

    public function deleteDofaPlanningProject(int $id): Collection;
}
