<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;


interface ControlPanelProjectInterface {

    public function createNewControlPanelProject(Collection $controlPanelProject): Collection;

    public function updateControlPanelProject(Collection $controlPanelProject, int $id): Collection;

    public function getAllControlPanelProjectByProject(String $projectId): Collection;

    public function getAllControlPanelProjectByAllProject(): Collection;

    public function getControlPanelProject(int $id): Collection;

    public function deleteControlPanelProject(int $id): Collection;
}
