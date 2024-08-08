<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\DofaPlanningInterface;
use App\Models\Modules\Viper\DofaPlanning;
use Exception;


class DofaPlanningService implements DofaPlanningInterface{

    public function createNewDofaPlanning(Collection $dofaPlanning): Collection
    {
        $newDofaPlanning = new DofaPlanning($dofaPlanning->toArray());
        $newDofaPlanning->save();
        return collect($newDofaPlanning);
    }

    public function updateDofaPlanning(Collection $dofaPlanning, int $id): Collection
    {
        $dofaPlanningUpdate = DofaPlanning::findOrFail($id);
        $dofaPlanningUpdate->fill($dofaPlanning->toArray());
        $dofaPlanningUpdate->save();
        return collect($dofaPlanningUpdate);
    }

    public function getAllDofaPlanning(): Collection
    {
        $dofaPlanning = DofaPlanning::all();

        return collect($dofaPlanning);
    }

    public function getDofaPlanning(int $id): Collection
    {
        $dofaPlanning = DofaPlanning::findOrFail($id);
        return collect($dofaPlanning);
    }

    public function deleteDofaPlanning(int $id): Collection
    {
        $dofaPlanning = DofaPlanning::findOrFail($id);
        $dofaPlanning->delete();

        return collect($dofaPlanning);
    }
}
