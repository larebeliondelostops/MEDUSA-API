<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;


interface StageControlInterface {

    public function createNewStageControl(Collection $stageControl): Collection;

    public function updateStageControl(Collection $stageControl, int $id): Collection;

    public function getAllStageControl(): Collection;

    public function getStageControl(int $id): Collection;

    public function deleteStageControl(int $id): Collection;
}
