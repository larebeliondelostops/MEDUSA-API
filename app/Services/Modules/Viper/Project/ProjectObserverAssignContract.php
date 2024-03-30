<?php 

namespace App\Services\Modules\Viper\Project;

use App\Interfaces\Modules\Viper\Project\ProjectObserverAssignContractInterface;
use App\Helpers\Modules\Viper\AlertCreator;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Interfaces\Modules\Viper\ProjectInterface;

class ProjectObserverAssignContract implements ProjectObserverAssignContractInterface
{
    private AlertInterface $alertInterface;

    public function __construct(AlertInterface $alertInterface,ProjectInterface $projectInterface)
    {
        $this->alertInterface = $alertInterface;  
        $this->projectInterface = $projectInterface;
    }


    public function notify(array $data): void
    {
        $project = $this->projectInterface->getProjectByBPIN($data['project_id']);
        $alertData = AlertCreator::createAlertRevisionContratacion($project['bpin'], $project['execution_approval_date'],$project['execution_approval_date']);
        $alert = [
            "name" => $alertData["name"],
            "type" => $alertData["type"],
            "state" => "estado_de_alerta",
            "description" => $alertData["description"],
            "indicator_id" => null,
            "project_id"=> $project['bpin']
        ];

        $this->alertInterface->createNewAlert(collect($alert));
    }
}