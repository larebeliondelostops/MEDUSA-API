<?php

namespace App\Providers\Viper;

use App\Interfaces\Viper\DeliverableInterface;
use App\Interfaces\Viper\DepartmentInterface;
use App\Interfaces\Viper\MunicipalityInterface;
use App\Interfaces\Viper\ProjectMarkerInterface;
use App\Interfaces\Viper\StateInterface;
use App\Services\Viper\DeliverableService;
use App\Services\Viper\DepartmentService;
use App\Services\Viper\LocationService;
use App\Services\Viper\MunicipalityService;
use App\Interfaces\Viper\ProjectInterface;
use App\Services\Viper\ProjectMarkerService;
use App\Services\Viper\ProjectService;
use App\Interfaces\Viper\FolderInterface;
use App\Services\Viper\FolderService;
use App\Interfaces\Viper\DocumentInterface;
use App\Services\Viper\DocumentService;
use App\Interfaces\Viper\StageInterface;
use App\Services\Viper\StageService;
use App\Interfaces\Viper\SectorInterface;
use App\Services\Viper\SectorService;
use App\Interfaces\Viper\SubstateInterface;
use App\Services\Viper\SubstateService;
use App\Interfaces\Viper\SelectsInterface;
use App\Services\Viper\SelectsService;
use App\Services\Viper\StateService;
use App\Interfaces\Viper\AlertInterface;
use App\Interfaces\Viper\CoordinatesInterface;
use App\Services\Viper\AlertService;
use App\Interfaces\Viper\IndicatorInterface;
use App\Services\Viper\IndicatorService;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Viper\ScopeInterface;
use App\Services\Viper\ScopeService;
use App\Interfaces\Viper\SpecificObjectiveInterface;
use App\Services\Viper\SpecificObjectiveService;
use App\Interfaces\Viper\MeasurementUnitInterface;
use App\Services\Viper\MeasurementUnitService;
use App\Interfaces\Viper\ProductInterface;
use App\Services\Viper\CoordinatesService;
use App\Services\Viper\ProductService;
use App\Interfaces\Viper\ActivityInterface;
use App\Interfaces\Viper\LocationInterface;
use App\Services\Viper\ActivityService;
use App\Interfaces\Viper\PrecedenceInterface;
use App\Services\Viper\PrecedenceService;
use App\Interfaces\Viper\MilestoneClassInterface;
use App\Services\Viper\MilestoneClassService;
use App\Interfaces\Viper\MilestoneInterface;
use App\Services\Viper\MilestoneService;
use App\Interfaces\Viper\MilestoneSubclassInterface;
use App\Services\Viper\MilestoneSubclassService;
use App\Interfaces\Viper\ProofInterface;
use App\Services\Viper\ProofService;

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
    }
}
