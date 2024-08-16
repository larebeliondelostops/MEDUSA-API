<?php

namespace App\Services\Modules\Viper;

use App\Events\Modules\Viper\ViperWebSocket;
use Illuminate\Support\Collection;
use App\Models\Modules\Viper\Activity;
use App\Models\Modules\Viper\Project;
use App\Interfaces\Modules\Viper\ProgressInterface;
use App\Interfaces\Modules\Viper\ActivityControlInterface;
use Carbon\Carbon;
use Exception;

class ActivityControlService implements ActivityControlInterface{

    private ProgressInterface $progressInterface;

    public function __construct(ProgressInterface $progressInterface)
    {
        $this->progressInterface = $progressInterface;
    }

    public function getAllActivityControlByProject(String $projectId): Collection
    {
        $activities = Activity::whereHas('deliverable.product.specificObjective.scope', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })
        ->with('progress') 
        ->get();

        $project = Project::where('bpin', $projectId)
            ->select('start_date_execution_phase', 'completion_date')
            ->first();

        if (!$project || !$project->start_date_execution_phase || !$project->completion_date) {
            return collect([
                'isBefore' => false,
                'isDuring' => false,
                'isAfter' => false,
                'currentWeek' => null,
                'weeks' => [],
                'activityWeeks' => collect(),
            ]);
            }
        
        $startDate = Carbon::parse($project->start_date_execution_phase);
        $endDate = Carbon::parse($project->completion_date);
        $currentDate = Carbon::now();
        
        $isBefore = $currentDate->isBefore($startDate);
        $isDuring = $currentDate->isBetween($startDate, $endDate, true);
        $isAfter = $currentDate->isAfter($endDate);

        $weeks = $this->calculateProjectWeeks($startDate, $endDate);

        $currentWeek = $this->calculateCurrentWeek($currentDate, $weeks, $isDuring, $isAfter);
    
        $activityWeeks = $this->assignActivitiesToWeeks($activities, $weeks);

        return collect([
            'isBefore' => $isBefore,
            'isDuring' => $isDuring,
            'isAfter' => $isAfter,
            'currentWeek' => $currentWeek,
            'weeks' => $weeks,
            'activityWeeks' => $activityWeeks,
        ]);
    }    

    private function calculateCurrentWeek(Carbon $currentDate, Collection $weeks, bool $isDuring): int
    {
        $currentWeek = null;

        if ($isDuring) {
            foreach ($weeks as $week) {
                $weekStart = Carbon::parse($week['startDate']);
                $weekEnd = Carbon::parse($week['endDate']);
    
                if ($currentDate->between($weekStart, $weekEnd, true)) {
                    $currentWeek = $week['week'];
                    break;
                }
            }
        } 
        return $currentWeek;
    }


    public function calculateProjectWeeks(Carbon $startDate, Carbon $endDate): Collection
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

    private function assignActivitiesToWeeks(Collection $activities, Collection $weeks): Collection
    {
        $activitiesPerWeek = $weeks->mapWithKeys(function ($week) {
            return [$week['week'] => []];
        });

        foreach ($activities as $activity) {
            $activityStartDate = Carbon::parse($activity->start_date);
            $activityEndDate = Carbon::parse($activity->end_date);

            foreach ($weeks as $week) {
                $weekStart = Carbon::parse($week['startDate']);
                $weekEnd = Carbon::parse($week['endDate']);

                if ($activityStartDate->lessThanOrEqualTo($weekEnd) && $activityEndDate->greaterThanOrEqualTo($weekStart)) {
                    $activitiesPerWeek = $activitiesPerWeek->map(function ($activities, $weekNumber) use ($activity, $week) {
                        if ($weekNumber === $week['week']) {
                            $activities[] = [
                                'activity_id' => $activity->id,
                                'progress' => $this->progressInterface->getProgressesByActivityAndWeek($activity->id, $week['week']),
                            ];
                        }
                        return $activities;
                    });
                }
            }
        }

        return $activitiesPerWeek->sortKeys();
    }

    
}
