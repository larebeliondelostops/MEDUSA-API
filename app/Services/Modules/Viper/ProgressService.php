<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProgressInterface;
use App\Interfaces\Modules\Viper\ActivityInterface;
use App\Models\Modules\Viper\Progress;
use App\Models\Modules\Viper\Activity;
use Carbon\Carbon;


class ProgressService implements ProgressInterface {

    private ActivityInterface $activityInterface;

    public function __construct(ActivityInterface $activityInterface)
    {
        $this->activityInterface = $activityInterface;
    }

    public function createNewProgress(Collection $progress): Collection
    {
        $newProgress = new Progress($progress->toArray());
        $newProgress->save();
        
        return collect($newProgress);
    }

    public function createProgressesByActivity(Activity $activity)
    {
        $startDate = Carbon::parse(Activity::min('start_date'));
        $endDate = Carbon::parse(Activity::max('end_date'));
    
        $weeks = $this->calculateWeeks($startDate, $endDate);
    
        $activityStartDate = Carbon::parse($activity->start_date);
        $activityEndDate = Carbon::parse($activity->end_date);
    
        foreach($weeks as $week)
        {
            $weekStart = Carbon::parse($week['startDate']);
            $weekEnd = Carbon::parse($week['endDate']);
            
            if ($activityStartDate->lessThanOrEqualTo($weekEnd) && $activityEndDate->greaterThanOrEqualTo($weekStart)) {
                $progress = new Progress();
                $progress->week = $week['week'];
                $progress->activity_id = $activity->id;
                
                $progress->save();
            }
        }
    
        // Actualizar progresos para todas las actividades dentro del mismo proyecto
        $this->updateProgressesByAllActivity($activity->getProjectBpin(), $weeks);
    }
    

    public function calculateWeeks(Carbon $startDate, Carbon $endDate): Collection
    {
        $weeks = collect();
        $weekNumber = 1;
    
        $currentStartDate = $startDate;
        $firstSunday = $startDate->copy()->endOfWeek(Carbon::SUNDAY);
    
        if ($firstSunday->gt($endDate)) {
            $firstSunday = $endDate;
        }
    
        $weeks->push([
            'week' => $weekNumber,
            'startDate' => $currentStartDate->format('Y-m-d'),
            'endDate' => $firstSunday->format('Y-m-d'),
        ]);
        $weekNumber++;
    
        $currentStartDate = $firstSunday->copy()->addDay();
    
        while ($currentStartDate->lt($endDate)) {
            $weekEnd = $currentStartDate->copy()->endOfWeek(Carbon::SUNDAY);
    
            if ($weekEnd->gt($endDate)) {
                $weekEnd = $endDate;
            }
    
            $weeks->push([
                'week' => $weekNumber,
                'startDate' => $currentStartDate->format('Y-m-d'),
                'endDate' => $weekEnd->format('Y-m-d'),
            ]);
    
            $weekNumber++;
            $currentStartDate = $weekEnd->copy()->addDay();
        }
    
        return $weeks;
    }
    

    public function updateProgress(Collection $progress, int $id): Collection
    {
        $progressUpdate = Progress::findOrFail($id);
        $progressUpdate->fill($progress->toArray());
        $activity = $this->activityInterface->getActivity($progressUpdate->activity_id);

        $progressUpdate->financial_progress_on_site = $progressUpdate->billed_financial_progress /  $activity['total_value']  * 100;

        if ($this->totalBilledFinancialProgress($activity['id'],$id) + $progressUpdate->financial_progress_on_site > $activity['total_value']) {
            throw new \Exception('El avance financiero en sitio no puede exceder el 100%.');
        }
        
        if ($this->totalActualPhysicalProgress($activity['id'],$id) + $progressUpdate->actual_physical_progress > 100) {
            throw new \Exception('La suma del avance físico no puede exceder el 100%.');
        }

        if ($this->totalProgressOfTerm($activity['id'],$id) + $progressUpdate->progress_of_term > 100) {
            throw new \Exception('La suma del avance de plazo no puede exceder el 100%.');
        }
        
        $progressUpdate->save();

        $progresses = $this->getAllProgressesByActivity($progressUpdate->activity_id);

        $previousProgress = null;
        foreach ($progresses as $item) {
            if ($item['week'] >= $progressUpdate->week) {
                if ($previousProgress) {
                    $item['financial_progress_on_site'] = $previousProgress['financial_progress_on_site'] + $item['billed_financial_progress'] /  $activity['total_value']*100;

                    $this->update($item,$item['id']);
                }    
            }
            $previousProgress = $item;
        }

        return collect($progressUpdate);
    }

    private function totalBilledFinancialProgress(int $activityId, int $id)
    {
        return Progress::where('activity_id', $activityId)
            ->where('id', '!=', $id)
            ->sum('billed_financial_progress'); 
    }

    private function totalActualPhysicalProgress(int $activityId, int $id)
    {
        return Progress::where('activity_id', $activityId)
            ->where('id', '!=', $id)
            ->sum('actual_physical_progress'); 
    }

    private function totalProgressOfTerm(int $activityId, int $id)
    {
        return Progress::where('activity_id', $activityId)
            ->where('id', '!=', $id)
            ->sum('progress_of_term'); 
    }

    public function update(Collection $progress, int $id): Collection
    {
        $progressUpdate = Progress::findOrFail($id);
        $progressUpdate->fill($progress->toArray());
        $progressUpdate->save();
        
        return collect($progressUpdate);
    }


    public function updateProgressesByAllActivity(String $projectId, Collection $weeks)
    { 
        $activities = $this->activityInterface->getActivityByProject($projectId);

        foreach($activities as $activity)
        {
            $progresses = Progress::where('activity_id', $activity->id)
                ->orderBy('week', 'asc')
                ->get();

            $i =0;

            $activityStartDate = Carbon::parse($activity->start_date);
            $activityEndDate = Carbon::parse($activity->end_date);
    
            foreach($weeks as $week)
            {
                $weekStart = Carbon::parse($week['startDate']);
                $weekEnd = Carbon::parse($week['endDate']);


                if ($activityStartDate->lessThanOrEqualTo($weekEnd) && $activityEndDate->greaterThanOrEqualTo($weekStart)) {
                    $progress = $progresses->get($i);
                    if($progress->week != $week['week'])
                    {
                        $progress->week = $week['week'];
                        $this->updateProgress($progress,$progress->id);
                    }
                    $i += 1;
                }
            }
        }
    }

    public function getAllProgressesByActivity(int $activityId): Collection
    {
        $progresses = Progress::where('activity_id', $activityId)->orderBy('week', 'asc')->get();

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

    public function getStatisticsProgress(int $projectId): Collection
    {
        $activities = Activity::whereHas('deliverable.product.specificObjective.scope', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })
        ->get();
        $statisticsProgress = [];
        foreach($activities as $activity)
        {
            $progresses =  $this->getAllProgressesByActivity($activity->id);
            $statisticsProgress[] = [
                'activity_id' => $activity->id,
                'totalFinancialProgressOnSite' => $progresses->sum('billed_financial_progress'),
                'totalBilledFinancialProgress' => $progresses->sum('billed_financial_progress') / $activity->total_value*100,
                'totalActualPhysicalProgress' => $progresses->sum('actual_physical_progress'),
                'totalProgressOfTerm' => $progresses->sum('progress_of_term'),

            ];
        }

        return collect($statisticsProgress);
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
