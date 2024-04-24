<?php 

namespace App\Services\Modules\Viper\Project;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Models\Modules\Viper\Project;
use App\Helpers\Modules\Viper\AlertCreator;
use Illuminate\Support\Facades\DB;

class ProjectObserver
{
    private AlertInterface $alertInterface;

    public function __construct(AlertInterface $alertInterface)
    {
        $this->alertInterface = $alertInterface;  
    }

    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Modules\Viper\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        $alertData = AlertCreator::createAlertCumplimientoRequisitosIniciales($project['bpin'], $project['execution_approval_date']);
        $alert = [
            "name" => $alertData["name"],
            "type" => $alertData["type"],
            "state" => "estado_de_alerta",
            "description" => $alertData["description"],
            "indicator_id" => null,
            "project_id"=> $project['bpin'],
            "user_email" => "ignicion@ignicion.com"
        ];

        $this->alertInterface->createNewAlert(collect($alert));
    }
}