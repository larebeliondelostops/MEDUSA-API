<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProgressInterface;
use App\Models\Modules\Viper\Progress;
use Exception;

class ProgressService implements ProgressInterface {

    public function createNewProgress(Collection $progress): Collection
    {
        $newProgress = new Progress($progress->toArray());
        $newProgress->save();

        return collect($newProgress);
    }

    public function updateProgress(Collection $progress, int $id): Collection
    {
        $progressUpdate = Progress::findOrFail($id);
        $progressUpdate->fill($progress->toArray());
        $progressUpdate->save();

        return collect($progressUpdate);
    }

    public function getAllProgressesByActivity(int $activityId): Collection
    {
        $progresses = Progress::where('activity_id', $activityId)->get();

        $progresses = $progresses->transform(function ($progress) {
            return collect($progress);
        });

        return $progresses;
    }

    public function getProgress(int $id): Collection
    {
        $progress = Progress::findOrFail($id);

        return collect($progress);
    }

    public function deleteProgress(int $id): Collection
    {
        $progress = Progress::findOrFail($id);
        $progress->delete();

        return collect($progress);
    }
}
