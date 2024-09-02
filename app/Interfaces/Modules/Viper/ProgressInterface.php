<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;
use App\Models\Modules\Viper\Activity;

interface ProgressInterface {

    public function createNewProgress(Collection $progress): Collection;
    
    public function createProgressesByActivity(Activity $activity);

    public function updateProgress(Collection $progress, int $id): Collection;

    public function getAllProgressesByActivity(int $activityId): Collection;

    public function getProgressesByActivityAndWeek(int $activityId, String $week): Collection;

    public function getStatisticsProgress(int $projectId): Collection;

    public function getProgress(int $id): Collection;

    public function deleteProgress(int $id): Collection;
}
