<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface DofaPlanningInterface {

    public function createNewDofaPlanning(Collection $dofaPlanning): Collection;

    public function updateDofaPlanning(Collection $dofaPlanning, int $id): Collection;

    public function getAllDofaPlanning(): Collection;

    public function getDofaPlanning(int $id): Collection;

    public function deleteDofaPlanning(int $id): Collection;
}
