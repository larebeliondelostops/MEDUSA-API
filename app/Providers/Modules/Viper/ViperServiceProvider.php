<?php

namespace App\Providers\Modules\Viper;

use App\Interfaces\Modules\Viper\ActivityInterface;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Interfaces\Modules\Viper\CoordinatesInterface;
use App\Interfaces\Modules\Viper\DeliverableInterface;
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
use App\Interfaces\Modules\Viper\ProjectInterface;
use App\Interfaces\Modules\Viper\ProjectMarkerInterface;
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
use App\Interfaces\Modules\Viper\ProjectContractInterface;
use App\Services\Modules\Viper\ActivityService;
use App\Services\Modules\Viper\AlertService;
use App\Services\Modules\Viper\CoordinatesService;
use App\Services\Modules\Viper\DeliverableService;
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
use App\Services\Modules\Viper\ProjectMarkerService;
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
use Illuminate\Support\ServiceProvider;

class ViperServiceProvider extends ServiceProvider
{
    public function register(){
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
        $this->app->bind(AlertInterface::class, AlertService::class);
        $this->app->bind(IndicatorInterface::class, IndicatorService::class);
        $this->app->bind(MeasurementUnitInterface::class, MeasurementUnitService::class);
        $this->app->bind(DeliverableInterface::class, DeliverableService::class);
        $this->app->bind(CoordinatesInterface::class, CoordinatesService::class);
        $this->app->bind(ProductInterface::class, ProductService::class);
        $this->app->bind(ProjectMarkerInterface::class, ProjectMarkerService::class);
        $this->app->bind(ActivityInterface::class, ActivityService::class);
        $this->app->bind(PrecedenceInterface::class, PrecedenceService::class);
        $this->app->bind(LocationInterface::class, LocationService::class);
        $this->app->bind(MilestoneClassInterface::class, MilestoneClassService::class);
        $this->app->bind(MilestoneInterface::class, MilestoneService::class);
        $this->app->bind(MilestoneSubclassInterface::class, MilestoneSubclassService::class);
        $this->app->bind(ProofInterface::class, ProofService::class);
        $this->app->bind(ScheduleInterface::class, ScheduleService::class);
        $this->app->bind(ReportInterface::class, ReportService::class);
        $this->app->bind(ProjectContractInterface::class, ProjectContractService::class);
    }
}
