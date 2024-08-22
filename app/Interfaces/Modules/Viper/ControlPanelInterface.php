<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;


interface ControlPanelInterface {

    public function createNewControlPanel(Collection $controlPanel): Collection;

    public function updateControlPanel(Collection $controlPanel, int $id): Collection;

    public function getControlPanelByStageControl(int $stageControlId): Collection;

    public function getAllControlPanelByStageControl(): Collection;

    public function getControlPanel(int $id): Collection;

    public function deleteControlPanel(int $id): Collection;
}
