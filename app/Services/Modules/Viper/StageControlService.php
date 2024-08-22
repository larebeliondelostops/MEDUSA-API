<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\StageControlInterface;
use App\Models\Modules\Viper\StageControl;
use Exception;


class StageControlService implements StageControlInterface{

    public function createNewStageControl(Collection $stageControl): Collection
    {
        $newStageControl= new StageControl($stageControl->toArray());
        $newStageControl->save();
        return collect($newStageControl);
    }

    public function updateStageControl(Collection $stageControl, int $id): Collection
    {
        $stageControlUpdate = StageControl::findOrFail($id);
        $stageControlUpdate->fill($stageControl->toArray());
        $stageControlUpdate->save();
        return collect($stageControlUpdate);
    }

    public function getAllStageControl(): Collection
    {
        $stageControl = StageControl::all();

        return collect($stageControl);
    }

    public function getStageControl(int $id): Collection
    {
        $stageControl = StageControl::findOrFail($id);
        return collect($stageControl);
    }

    public function deleteStageControl(int $id): Collection
    {
        $stageControl = StageControl::findOrFail($id);
        $stageControl->delete();

        return collect($stageControl);
    }
}
