<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProgressInterface;
use App\Interfaces\Modules\Viper\ActivityInterface;
use App\Models\Modules\Viper\Progress;
use App\Models\Modules\Viper\Activity;


class ProgressService implements ProgressInterface {

    private ActivityInterface $activityInterface;

    public function __construct(ActivityInterface $activityInterface)
    {
        $this->activityInterface = $activityInterface;
    }

    public function createNewProgress(Collection $progress): Collection
    {
        $newProgress = new Progress($progress->toArray());
        $activity = $this->activityInterface->getActivity($newProgress->activity_id);
    
        $progresses = $this->getAllProgressesByActivity($newProgress->activity_id);
        $newProgress->financial_progress_on_site = $newProgress->billed_financial_progress /  $activity['total_value']  * 100;
    
        if ($progresses->isEmpty()) {
            if ($newProgress->financial_progress_on_site > 100) {
                dd("El progreso financiero en sitio no puede exceder el 100%.");
                throw new \Exception('El progreso financiero en sitio no puede exceder el 100%.');
            }
            
            $newProgress->progress_of_term = $newProgress->actual_physical_progress;
            $newProgress->save();
        } else {
            $totalFinancialProgress = $progresses->sum('financial_progress_on_site') + $newProgress->financial_progress_on_site;
            
            if ($totalFinancialProgress > 100) {
                dd('El progreso financiero en sitio no puede exceder el 100%.');
                throw new \Exception('El progreso financiero en sitio no puede exceder el 100%.');
            }
    
            $totalProgressOfTerm = $progresses->sum('progress_of_term') + $newProgress->actual_physical_progress;
            
            if ($totalProgressOfTerm > 100) {
                dd('La suma del progreso físico no puede exceder el 100%.');
                throw new \Exception('La suma del progreso físico no puede exceder el 100%.');
            }
            
            foreach ($progresses as $item) {
                $this->updateProgress($item, $item['id']);
            }
            $newProgress->progress_of_term = $totalProgressOfTerm;
            $newProgress->save();
        }
        
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
