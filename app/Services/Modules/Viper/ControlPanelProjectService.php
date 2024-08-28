<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ControlPanelProjectInterface;
use App\Interfaces\Modules\Viper\ProjectInterface;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Interfaces\Modules\Viper\IndicatorInterface;
use App\Interfaces\Modules\Viper\ActivityInterface;
use App\Models\Modules\Viper\ControlPanelProject;
use Carbon\Carbon;
use Exception;


class ControlPanelProjectService implements ControlPanelProjectInterface {

    private ProjectInterface $projectInterface;
    private ProductInterface $productInterface;
    private IndicatorInterface $indicatorInterface;
    private ActivityInterface $activityInterface;

    public function __construct(ProjectInterface $projectInterface, ProductInterface $productInterface, IndicatorInterface $indicatorInterface, ActivityInterface $activityInterface)
    {
        $this->projectInterface = $projectInterface;
        $this->productInterface = $productInterface;
        $this->indicatorInterface = $indicatorInterface;
        $this->activityInterface = $activityInterface;
    }

    public function createNewControlPanelProject(Collection $controlPanelProject): Collection
    {
        $newControlPanelProject = new ControlPanelProject($scope->toArray());
        $controlPanelProject->save();
        return collect($newControlPanelProject);
    }

    public function updateControlPanelProject(Collection $controlPanelProject, int $id): Collection
    {
        $controlPanelProjectUpdate = ControlPanelProject::findOrFail($id);
        $controlPanelProjectUpdate->fill($controlPanelProject->toArray());
        $controlPanelProjectUpdate->save();
        return collect($controlPanelProjectUpdate);
    }
    
    public function getAllControlPanelProjectByProject(string $projectId): Collection
    {
        $controlPanelProjects = $this->getControlPanelProjects($projectId);
        $projectInfo = $controlPanelProjects->first()->project;
        
        $projectInformation = $this->getProjectInformation($projectInfo);
        
        $activities = $this->activityInterface->getActivityByProject($projectId);
        $formulationAndApproval = $this->getFormulationAndApproval($projectInfo, $projectId, $activities);
        $prioritizationAndApproval = $this->getPrioritizationAndApproval($projectInfo);
        $prioritizationAndApproval = $this->getPrioritizationAndApproval($projectInfo);
        $execution = $this->getExecution($projectInfo, $activities);

        $groupedByStageControlAndControlPanel = $this->groupByStageControlAndControlPanel($controlPanelProjects);
    
        $finalResult = [
            'INFORMACION DE PROYECTO' => $projectInformation,
        ];
    
        $finalResult = array_merge($finalResult, $groupedByStageControlAndControlPanel->toArray());
        $finalResult['ETAPA DE FORMULACION Y APROBACIÓN'] = array_merge(
            $finalResult['ETAPA DE FORMULACION Y APROBACIÓN'] ?? [],
            $formulationAndApproval
        );

        $finalResult['ETAPA DE PRIORIZACIÓN Y APROBACION'] = array_merge(
            $finalResult['ETAPA DE PRIORIZACIÓN Y APROBACION'] ?? [],
            $prioritizationAndApproval
        );

        $finalResult['ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'] = array_merge(
            $finalResult['ETAPA DE EJECUCIÓN - SEGUIMIENTO Y CONTROL'] ?? [],
            $execution
        );
    
        return collect($finalResult);
    }
    
    private function getControlPanelProjects(string $projectId): Collection
    {
        return ControlPanelProject::where('project_id', $projectId)
            ->whereHas('project')
            ->with('controlPanel.stageControl')
            ->with('project.scope')
            ->with('project.department')
            ->with('project.projectMunicipality.municipality')
            ->get();
    }
    
    private function getProjectInformation($projectInfo): array
    {
        return [
            'CODIGO BIN' => [
                $projectInfo->bpin,
            ],
            'NOMBRE DEL PROYECTO' => [
                $projectInfo->name,
            ],
        ];
    }
    
    private function getFormulationAndApproval($projectInfo, string $projectId, Collection $activities): array
    {
        $products = $this->productInterface->getAllProducts($projectId);
        $indicators = $products ? $products->flatMap(function ($product) {
            return $this->indicatorInterface->getAllIndicatorsByProduct($product->id)->map->only(['id','name','target_value','progress','percentage_completed','is_main','measurementUnit']);
        }) : null;
        $products =  $products ? $products->map->only(['id','name','measurementUnit']):null;
        $activities = $activities->map->only(['id', 'description', 'number']);
        return [
            'META DEL PROYECTO' => [
                $projectInfo->scope ? $projectInfo->scope->description : null,
            ],
            'INDICADORES' => [
                $indicators ? $indicators : null,
            ],
            'PRODUCTOS' => [
                $products ? $products : null,
            ],
            'ACTIVIDADES' => [
                $activities,
            ],
            'LOCALIZACION' => [
                'department' => $projectInfo->department ? $projectInfo->department->name : null,
                'municipalities' => $projectInfo->projectMunicipality ? $projectInfo->projectMunicipality->pluck('municipality.name')
                        ->unique() : null,
            ],
            'VALOR DEL PROYECTO' => [
                $projectInfo->total_value ? $projectInfo->total_value : null,
            ],
        ];
    }

    private function getPrioritizationAndApproval($projectInfo)
    {
        return [
            'PLAZO DEL PROYECTO' => [
                'start_date' => $projectInfo->start_date_execution_phase,
                'end_date' => $projectInfo->completion_date,
            ],
        ];
    }

    private function getExecution($projectInfo, $activities){
        $startDate = Carbon::parse($activities->min('start_date'));
        $endDate = Carbon::parse($activities->max('end_date'));

        $months = $this->calculateMonths($startDate, $endDate);
        $activitiesToMonths = $this->assignActivitiesToMonths($activities, $months);
        return [
            'PLAZO DE EJECUCIÓN' => [
                $projectInfo->start_date_execution_phase,
            ],
            'ACTIVIDADES POR MES' => [
                $activitiesToMonths,
            ],
        ];
    }

    private function getStartAndEndDates(Collection $activities): array
    {
        $startDate = null;
        $endDate = null;
    
        foreach ($activities as $activity) {
            $activityStartDate = Carbon::parse($activity->start_date);
            $activityEndDate = Carbon::parse($activity->end_date);
    
            if (is_null($startDate) || $activityStartDate->lt($startDate)) {
                $startDate = $activityStartDate;
            }
    
            if (is_null($endDate) || $activityEndDate->gt($endDate)) {
                $endDate = $activityEndDate;
            }
        }
    
        return [$startDate, $endDate];
    }

    public function calculateMonths(Carbon $startDate, Carbon $endDate): Collection
    {
        $months = collect();
        $monthNumber = 1;
        
        $currentStartDate = $startDate;
        $firstEndOfMonth = $startDate->copy()->endOfMonth();
        
        if ($firstEndOfMonth->gt($endDate)) {
            $firstEndOfMonth = $endDate;
        }
        
        $months->push([
            'month' => $monthNumber,
            'startDate' => $currentStartDate->format('Y-m-d'),
            'endDate' => $firstEndOfMonth->format('Y-m-d'),
        ]);
        $monthNumber++;
        
        $currentStartDate = $firstEndOfMonth->copy()->addDay();
        
        while ($currentStartDate->lt($endDate)) {
            $monthEnd = $currentStartDate->copy()->endOfMonth();
            
            if ($monthEnd->gt($endDate)) {
                $monthEnd = $endDate;
            }
            
            $months->push([
                'month' => $monthNumber,
                'startDate' => $currentStartDate->format('Y-m-d'),
                'endDate' => $monthEnd->format('Y-m-d'),
            ]);
            
            $monthNumber++;
            $currentStartDate = $monthEnd->copy()->addDay();
        }
        
        return $months;
    }
    

    private function assignActivitiesToMonths(Collection $activities, Collection $months): Collection
    {
        $activitiesPerMonth = $months->mapWithKeys(function ($month) {
            return [$month['month'] => []];
        });
    
        foreach ($activities as $activity) {
            $activityStartDate = Carbon::parse($activity->start_date);
            $activityEndDate = Carbon::parse($activity->end_date);
    
            foreach ($months as $month) {
                $monthStart = Carbon::parse($month['startDate']);
                $monthEnd = Carbon::parse($month['endDate']);
    
                if ($activityStartDate->lessThanOrEqualTo($monthEnd) && $activityEndDate->greaterThanOrEqualTo($monthStart)) {
                    $activitiesPerMonth = $activitiesPerMonth->map(function ($activities, $monthNumber) use ($activity, $month) {
                        if ($monthNumber === $month['month']) {
                            $activities[] = [
                                'id' => $activity->id,
                                'description' => $activity->description,
                                'number' => $activity->number,
                            ];
                        }
                        return $activities;
                    });
                }
            }
        }
    
        return $activitiesPerMonth;
    }
    

    private function groupByStageControlAndControlPanel(Collection $controlPanelProjects): Collection
    {
        return $controlPanelProjects->groupBy(function ($item) {
            return $item->controlPanel->stageControl->name;
        })->map(function ($group) {
            return $group->groupBy(function ($item) {
                return $item->controlPanel->name;
            })->map(function ($subgroup) {
                return $subgroup->map(function ($item) {
                    $item->makeHidden(['project', 'project_id', 'control_panel_id', 'controlPanel']);
                    return $item;
                });
            });
        });
    }
    
    public function getAllControlPanelProjectByAllProject(): Collection
    {
        $projects = $this->projectInterface->getAllProjects();
        
        $controlPanelProject = collect();
    
        foreach ($projects as $project) {
            $projectResult = $this->getAllControlPanelProjectByProject($project['bpin']);
            
            $controlPanelProject->push($projectResult);
        }
    
        return $controlPanelProject;
    }
    

    public function getControlPanelProject(int $id): Collection
    {
        $controlPanelProject = ControlPanelProject::findOrFail($id);
        return collect($controlPanelProject);
    }

    public function deleteControlPanelProject(int $id): Collection
    {
        $controlPanelProject = ControlPanelProject::findOrFail($id);
        $controlPanelProject->delete();

        return collect($controlPanelProject);
    }
}
