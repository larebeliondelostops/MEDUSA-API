<?php 

namespace App\Services\Modules\Viper\Alert;

use App\Helpers\Modules\Viper\AlertCreator;
use App\Interfaces\Modules\Viper\ActivityAlertInterface;
use App\Interfaces\Modules\Viper\Alert\DeadlineActivityAlertInterface;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Models\Modules\Viper\Alert;
use App\Models\Modules\Viper\ProjectUserRole;
use Exception;
use Illuminate\Support\Facades\Log;

class DeadlineActivityAlertService implements DeadlineActivityAlertInterface
{
    private ActivityAlertInterface $activityAlertInterface;
    private AlertInterface $alertInterface;

    public function __construct(
        ActivityAlertInterface $activityAlertInterface,
        AlertInterface $alertInterface
    )
    {
        $this->activityAlertInterface = $activityAlertInterface;
        $this->alertInterface = $alertInterface;
    }

    public function execute()
    {
        try
        {
            $activitiesInDeadline = $this->activityAlertInterface->getActivitiesComingSoonToFinish();
            $activitiesJustNotified = Alert::whereIn('related_item_id', $activitiesInDeadline->pluck('id'))
                ->where('type', 'Alerta de vencimiento de plazos')
                ->get();

            $activitiesForNotify = $activitiesInDeadline->diff($activitiesJustNotified);

            foreach ($activitiesForNotify as $activity)
            {
                $activity = $activity->load('folder.project');
                $project = $activity->folder->project;
                $emailsToSendNotification = ProjectUserRole::with(['role', 'user'])
                        ->where('project_id', '=', $project->bpin)
                        ->whereHas('role', function($query){
                            $query->where('name', '=', 'ApoyoAdmon');
                        })->get()
                        ->pluck('user.email');
                    
                foreach($emailsToSendNotification as $email)
                {
                    $alertData = AlertCreator::createAlertVencimientoPlazos($project->bpin, '');
                    $alert = [
                        "name" => $alertData["name"],
                        "type" => $alertData["type"],
                        "description" => $alertData["description"],
                        "indicator_id" => null,
                        "project_id"=> $project->bpin,
                        "user_email" => $email,
                        'severity_id' => $alertData['severity_id']   
                    ];
                    $this->alertInterface->createNewAlert(collect($alert));
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
