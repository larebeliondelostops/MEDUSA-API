<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProgressInterface;
use App\Models\Modules\Viper\Progress;
use App\Models\Modules\Viper\Activity;
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

    public function getProgressesByActivityAndWeek(int $activityId, String $week): Collection
    {
        $progresses = Progress::where('activity_id', $activityId)->where('week',$week)->get();

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

    public function getAverageProgress(int $projectId): Collection
    {
        $activities = Activity::whereHas('deliverable.product.specificObjective.scope', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })
        ->with('progress') 
        ->get();

        $totalPlannedPhysicalProgress = 0;
        $totalActualPhysicalProgress = 0;
        $totalFinancialProgressOnSite = 0;
        $totalBilledFinancialProgress = 0;

        foreach ($activities as $activity) {
            $progress = $activity->progress;

            if ($progress) {
                $totalPlannedPhysicalProgress += $progress->planned_physical_progress;
                $totalActualPhysicalProgress += $progress->actual_physical_progress;
                $totalFinancialProgressOnSite += $progress->financial_progress_on_site;
                $totalBilledFinancialProgress += $progress->billed_financial_progress;
            }
        }

        $totalActivityCount = $activities->count();
        $averageProgress = [
            'planned_physical_progress' => $totalPlannedPhysicalProgress / $totalActivityCount,
            'actual_physical_progress' => $totalActualPhysicalProgress / $totalActivityCount,
            'financial_progress_on_site' => $totalFinancialProgressOnSite / $totalActivityCount,
            'billed_financial_progress' => $totalBilledFinancialProgress / $totalActivityCount,
        ];

        return new Collection([$averageProgress]);
    }


    public function deleteProgress(int $id): Collection
    {
        $progress = Progress::findOrFail($id);
        $progress->delete();

        return collect($progress);
    }
}
