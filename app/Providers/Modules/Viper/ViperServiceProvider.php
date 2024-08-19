<?php

namespace App\Providers\Modules\Viper;

// Interfaces
use App\Interfaces\Modules\Viper\ActivityInterface;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Interfaces\Modules\Viper\CoordinatesInterface;
use App\Interfaces\Modules\Viper\Deliverable\DeliverableEventActivityInterface;
use App\Interfaces\Modules\Viper\Deliverable\DeliverableInterface;
use App\Interfaces\Modules\Viper\DepartmentInterface;
use App\Interfaces\Modules\Viper\DocumentInterface;
use App\Interfaces\Modules\Viper\FolderInterface;
use App\Interfaces\Modules\Viper\IndicatorInterface;
use App\Interfaces\Modules\Viper\LocationInterface;
use App\Interfaces\Modules\Viper\MeasurementUnitInterface;
use App\Interfaces\Modules\Viper\MilestoneClassInterface;
use App\Interfaces\Modules\Viper\MilestoneInterface;
use App\Interfaces\Modules\Viper\MilestoneSubclassInterface;
use App\Interfaces\Modules\Viper\MunicipalityInterface;
use App\Interfaces\Modules\Viper\PrecedenceInterface;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Interfaces\Modules\Viper\Project\ProjectObserverAssignContractInterface;
use App\Interfaces\Modules\Viper\ProjectBotDocumentsInterface;
use App\Interfaces\Modules\Viper\ProjectInterface;
use App\Interfaces\Modules\Viper\ProofInterface;
use App\Interfaces\Modules\Viper\ReportInterface;
use App\Interfaces\Modules\Viper\ScheduleInterface;
use App\Interfaces\Modules\Viper\ScopeInterface;
use App\Interfaces\Modules\Viper\SectorInterface;
use App\Interfaces\Modules\Viper\SelectsInterface;
use App\Interfaces\Modules\Viper\SpecificObjectiveInterface;
use App\Interfaces\Modules\Viper\StageInterface;
use App\Interfaces\Modules\Viper\StateInterface;
use App\Interfaces\Modules\Viper\SubstateInterface;
use App\Interfaces\Modules\Viper\TrackingMatrixInterface;
use App\Interfaces\Modules\PermissionInterface;
use App\Interfaces\Modules\Viper\ProjectContractInterface;
use App\Interfaces\Modules\Viper\ProjectUserRoleInterface;
use App\Interfaces\Modules\Viper\ImprovementPlanInterface;
use App\Interfaces\Modules\Viper\MessageBotInterface;
use App\Interfaces\Modules\Viper\ProjectMunicipalityInterface;
use App\Interfaces\Modules\Viper\PhaseInterface;
use App\Interfaces\Modules\Viper\ProjectSheetInterface;
use App\Interfaces\Modules\Viper\ProjectSheetDocumentInterface;
use App\Interfaces\Modules\Viper\ProgressInterface;
use App\Interfaces\Modules\Viper\DofaPlanningInterface;
use App\Interfaces\Modules\Viper\DofaPlanningProjectInterface;
use App\Interfaces\Modules\Viper\ActivityControlInterface;
use App\Interfaces\Modules\Viper\StageControlInterface;
use App\Interfaces\Modules\Viper\ControlPanelInterface;
use App\Interfaces\Modules\Viper\ControlPanelProjectInterface;
// Services
use App\Services\Modules\Viper\AlertService;
use App\Services\Modules\Viper\CoordinatesService;
use App\Services\Modules\Viper\Deliverable\DeliverableEventActivityService;
use App\Services\Modules\Viper\Deliverable\DeliverableService;
use App\Services\Modules\Viper\DepartmentService;
use App\Services\Modules\Viper\DocumentService;
use App\Services\Modules\Viper\FolderService;
use App\Services\Modules\Viper\IndicatorService;
use App\Services\Modules\Viper\LocationService;
use App\Services\Modules\Viper\MeasurementUnitService;
use App\Services\Modules\Viper\MilestoneClassService;
use App\Services\Modules\Viper\MilestoneService;
use App\Services\Modules\Viper\MilestoneSubclassService;
use App\Services\Modules\Viper\MunicipalityService;
use App\Services\Modules\Viper\PrecedenceService;
use App\Services\Modules\Viper\ProductService;
use App\Services\Modules\Viper\Project\ProjectObserverAssignContract;
use App\Services\Modules\Viper\ProjectBotDocumentsService;
use App\Services\Modules\Viper\ProjectService;
use App\Services\Modules\Viper\ProofService;
use App\Services\Modules\Viper\ReportService;
use App\Services\Modules\Viper\ScheduleService;
use App\Services\Modules\Viper\ScopeService;
use App\Services\Modules\Viper\SectorService;
use App\Services\Modules\Viper\SelectsService;
use App\Services\Modules\Viper\SpecificObjectiveService;
use App\Services\Modules\Viper\StageService;
use App\Services\Modules\Viper\StateService;
use App\Services\Modules\Viper\SubstateService;
use App\Services\Modules\Viper\ProjectContractService;
use App\Services\Modules\Viper\ProjectUserRoleService;
use App\Services\Modules\Viper\ImprovementPlanService;
use App\Services\Modules\Viper\TrackingMatrixService;
use App\Services\Modules\Viper\MessageBotService;
use App\Services\Modules\PermissionService;
use App\Services\Modules\Viper\Activity\ActivityService;
use App\Services\Modules\Viper\ProjectMunicipalityService;
use App\Services\Modules\Viper\PhaseService;
use App\Services\Modules\Viper\ProjectSheetService;
use App\Services\Modules\Viper\ProjectSheetDocumentService;
use App\Services\Modules\Viper\ProgressService;
use App\Services\Modules\Viper\DofaPlanningService;
use App\Services\Modules\Viper\DofaPlanningProjectService;
use App\Services\Modules\Viper\ActivityControlService;
use App\Services\Modules\Viper\StageControlService;
use App\Services\Modules\Viper\ControlPanelService;
use App\Services\Modules\Viper\ControlPanelProjectService;
// Observers
use App\Services\Modules\Viper\Activity\ActivityObserver;
use App\Services\Modules\Viper\Project\ProjectObserver;
use App\Services\Modules\Viper\Deliverable\DeliverableObserver;
// Models
use App\Models\Modules\Viper\Activity;
use App\Models\Modules\Viper\Project;
use App\Models\Modules\Viper\Deliverable;
// Third Party
use Illuminate\Support\ServiceProvider;

class ViperServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(AlertInterface::class, AlertService::class);
        $this->app->bind(ProjectInterface::class, ProjectService::class);
        $this->app->bind(FolderInterface::class, FolderService::class);
        $this->app->bind(DocumentInterface::class, DocumentService::class);
        $this->app->bind(SectorInterface::class, SectorService::class);
        $this->app->bind(SubstateInterface::class, SubstateService::class);
        $this->app->bind(ScopeInterface::class,ScopeService::class);
        $this->app->bind(SpecificObjectiveInterface::class,SpecificObjectiveService::class);
        $this->app->bind(StageInterface::class, StageService::class);
        $this->app->bind(DepartmentInterface::class, DepartmentService::class);
        $this->app->bind(MunicipalityInterface::class, MunicipalityService::class);
        $this->app->bind(StateInterface::class, StateService::class);
        $this->app->bind(SelectsInterface::class, SelectsService::class);
        $this->app->bind(IndicatorInterface::class, IndicatorService::class);
        $this->app->bind(MeasurementUnitInterface::class, MeasurementUnitService::class);
        $this->app->bind(DeliverableInterface::class, DeliverableService::class);
        $this->app->bind(CoordinatesInterface::class, CoordinatesService::class);
        $this->app->bind(ProductInterface::class, ProductService::class);
        $this->app->bind(ActivityInterface::class, ActivityService::class);
        $this->app->bind(PrecedenceInterface::class, PrecedenceService::class);
        $this->app->bind(LocationInterface::class, LocationService::class);
        $this->app->bind(MilestoneClassInterface::class, MilestoneClassService::class);
        $this->app->bind(MilestoneInterface::class, MilestoneService::class);
        $this->app->bind(MilestoneSubclassInterface::class, MilestoneSubclassService::class);
        $this->app->bind(ProofInterface::class, ProofService::class);
        $this->app->bind(ScheduleInterface::class, ScheduleService::class);
        $this->app->bind(ReportInterface::class, ReportService::class);
        $this->app->bind(DeliverableEventActivityInterface::class, DeliverableEventActivityService::class);
        $this->app->bind(ImprovementPlanInterface::class, ImprovementPlanService::class);
        $this->app->bind(TrackingMatrixInterface::class, TrackingMatrixService::class);
        $this->app->bind(ProjectContractInterface::class, ProjectContractService::class);
        $this->app->bind(ProjectUserRoleInterface::class, ProjectUserRoleService::class);
        $this->app->bind(PermissionInterface::class, PermissionService::class);
        $this->app->bind(MessageBotInterface::class, MessageBotService::class);
        $this->app->bind(ProjectBotDocumentsInterface::class, ProjectBotDocumentsService::class);
        $this->app->bind(ProjectMunicipalityInterface::class, ProjectMunicipalityService::class);
        $this->app->bind(PhaseInterface::class, PhaseService::class);
        $this->app->bind(ProjectSheetInterface::class, ProjectSheetService::class);
        $this->app->bind(ProjectSheetDocumentInterface::class, ProjectSheetDocumentService::class);
        $this->app->bind(ProgressInterface::class, ProgressService::class);
        $this->app->bind(DofaPlanningInterface::class, DofaPlanningService::class);
        $this->app->bind(DofaPlanningProjectInterface::class, DofaPlanningProjectService::class);
        $this->app->bind(ActivityControlInterface::class, ActivityControlService::class);
        $this->app->bind(StageControlInterface::class, StageControlService::class);
        $this->app->bind(ControlPanelInterface::class, ControlPanelService::class);
        $this->app->bind(ControlPanelProjectInterface::class, ControlPanelProjectService::class);

        //Observers
        $this->app->bind(ProjectObserverAssignContractInterface::class, ProjectObserverAssignContract::class);
    }

    public function boot()
    {
        // observers registered
        Activity::observe(ActivityObserver::class);
        Project::observe(ProjectObserver::class);
        Deliverable::observe(DeliverableObserver::class);
    }
}
