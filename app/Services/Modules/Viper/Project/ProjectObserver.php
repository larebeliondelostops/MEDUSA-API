<?php 

namespace App\Services\Modules\Viper\Project;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Models\Modules\Viper\Project;
use App\Helpers\Modules\Viper\AlertCreator;
use Database\Seeders\modules\viper\ProjectSheetDocumentSeeder;
use Database\Seeders\modules\viper\DofaPlanningProjectSeeder;
use Database\Seeders\modules\viper\ControlPanelProjectSeeder;

class ProjectObserver
{
    private AlertInterface $alertInterface;
    private ProjectSheetDocumentSeeder $projectSheetDocumentSeeder;
    private DofaPlanningProjectSeeder $dofaPlanningProjectSeeder;
    private ControlPanelProjectSeeder $controlPanelProjectSeeder;

    public function __construct(AlertInterface $alertInterface, ProjectSheetDocumentSeeder $projectSheetDocumentSeeder, DofaPlanningProjectSeeder $dofaPlanningProjectSeeder, ControlPanelProjectSeeder $controlPanelProjectSeeder)
    {
        $this->alertInterface = $alertInterface;
        $this->projectSheetDocumentSeeder = $projectSheetDocumentSeeder;  
        $this->dofaPlanningProjectSeeder = $dofaPlanningProjectSeeder;
        $this->controlPanelProjectSeeder = $controlPanelProjectSeeder;
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
            "description" => $alertData["description"],
            "indicator_id" => null,
            "project_id"=> $project['bpin'],
            "user_email" => "ignicion@ignicion.com",
            'severity_id' => $alertData['severity_id']   
        ];

        $this->projectSheetDocumentSeeder->createProjectSheetDocumentsForProject($project['bpin']);

        $this->dofaPlanningProjectSeeder->createDofaPlanningProjectForProject($project['bpin']); 

        $this->controlPanelProjectSeeder->createControlPanelProjectForProject($project['bpin']); 

        $this->alertInterface->createNewAlert(collect($alert));
    }
}