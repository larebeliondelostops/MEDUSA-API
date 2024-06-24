<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ProgressInterface {

    public function createNewProgress(Collection $progress): Collection;

    public function updateProgress(Collection $progress, int $id): Collection;

    public function getAllProgressesByActivity(int $activityId): Collection;

    public function getProgress(int $id): Collection;

    public function deleteProgress(int $id): Collection;
}
