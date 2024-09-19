<?php

namespace App\Services\Modules\Viper\Alert;
use App\Helpers\Modules\Viper\AlertCreator;
use App\Interfaces\Modules\Viper\Alert\PartialComplianceAlertInterface;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Models\Modules\Viper\Activity;
use App\Models\Modules\Viper\Project;
use App\Models\Modules\Viper\ProjectUserRole;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class PartialComplianceAlertService implements PartialComplianceAlertInterface
{
    protected AlertInterface $alertInterface;
    public function __construct(AlertInterface $alertInterface)
    {
        $this->alertInterface = $alertInterface;
    }
    public function execute()
    {
        try
        {
            $executingProjects = Project::with('state')
                ->whereHas('state', function($query) {
                    $query->where('name', '=', 'En ejecución');
                })->get();
            
            $currentDate = Carbon::now()->format('Y-m-d');
            $firstDayOfCurrentMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
            foreach($executingProjects as $executingProject)
            {
                $numberOfActivitiesForThisMonth  = Activity::with('folder.project')
                    ->whereHas('folder', function($query) use ($executingProject){
                        $query->whereHas('project', function($subquery) use ($executingProject){
                            $subquery->where('bpin', '=', $executingProject->bpin);
                        });
                    })
                    ->where('end_date', '<=', $currentDate)->get()->count();

                $numberOfActivitiesCompletedThisMonth  = Activity::with('folder.project')
                    ->whereHas('folder', function($query) use ($executingProject){
                        $query->whereHas('project', function($subquery) use ($executingProject){
                            $subquery->where('bpin', '=', $executingProject->bpin);
                        });
                    })
                    ->where('end_date', '<=', $currentDate)
                    ->whereHas('status', function($query){
                            $query->where('name', '=', 'Completada');
                    })->get()->count();
                $percentageOfActivitiesCompletedForThisMonth = ($numberOfActivitiesCompletedThisMonth / $numberOfActivitiesForThisMonth) * 100;
                if($percentageOfActivitiesCompletedForThisMonth >= 50)
                {
                    $emailsToSendNotification = ProjectUserRole::with(['role', 'user'])
                        ->where('project_id', '=', $executingProject->bpin)
                        ->whereHas('role', function($query){
                            $query->where('name', '=', 'ApoyoAdmon');
                        })->get()
                        ->pluck('user.email');
                    
                    foreach($emailsToSendNotification as $email)
                    {
                        $alertData = AlertCreator::createAlertCumplimientoParcialActividades(
                            $executingProject->bpin,
                            $firstDayOfCurrentMonth,
                            $currentDate
                        );
                        $alert = [
                            "name" => $alertData['name'],
                            "description" => $alertData['description'],
                            "type" => $alertData['type'],
                            "severity_name" => $alertData['serverity_name'],
                            "severity_id" => $alertData['serverity_id'],
                            "recommendations" => $alertData['recommendations'],
                            "project_id"=> $executingProject->bpin,
                            "user_email" => $email,
                        ];
                        $this->alertInterface->createNewAlert(collect($alert));
                    }
                }
            }
            
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getFile() . ' - ' . $exception->getLine());   
            throw $exception;
        }
    }
}