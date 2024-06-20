<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface PhaseInterface {

    public function createNewPhase(Collection $phase): Collection;

    public function updatePhase(Collection $phase, int $id): Collection;

    public function getAllPhases(): Collection;

    public function getPhase(int $id): Collection;

    public function deletePhase(int $id): Collection;
}
