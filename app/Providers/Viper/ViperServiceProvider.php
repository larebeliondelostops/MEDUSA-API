<?php

namespace App\Providers\Viper;

use App\Interfaces\Viper\DepartmentInterface;
use App\Interfaces\Viper\MunicipalityInterface;
use App\Interfaces\Viper\StateInterface;
use App\Services\Viper\DepartmentService;
use App\Services\Viper\MunicipalityService;
use App\Interfaces\Viper\ProjectInterface;
use App\Services\Viper\ProjectService;
use App\Interfaces\Viper\FolderInterface;
use App\Services\Viper\FolderService;
use App\Interfaces\Viper\DocumentInterface;
use App\Services\Viper\DocumentService;
use App\Interfaces\Viper\StageInterface;
use App\Services\Viper\StageService;

use App\Services\Viper\StateService;
use Illuminate\Support\ServiceProvider;

class ViperServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(ProjectInterface::class, ProjectService::class);
        $this->app->bind(FolderInterface::class, FolderService::class);
        $this->app->bind(DocumentInterface::class, DocumentService::class);
        $this->app->bind(StageInterface::class, StageService::class);
        $this->app->bind(DepartmentInterface::class, DepartmentService::class);
        $this->app->bind(MunicipalityInterface::class, MunicipalityService::class);
        $this->app->bind(StateInterface::class, StateService::class);
    }
}
