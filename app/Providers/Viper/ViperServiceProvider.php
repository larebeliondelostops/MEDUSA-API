<?php 

namespace App\Providers\Viper;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Viper\ProjectInterface;
use App\Services\Viper\ProjectService;
use App\Interfaces\Viper\FolderInterface;
use App\Services\Viper\FolderService;
use App\Interfaces\Viper\DocumentInterface;
use App\Services\Viper\DocumentService;
use App\Interfaces\Viper\ScopeInterface;
use App\Services\Viper\ScopeService;
use App\Services\Viper\SpecificObjetiveInterface;
use App\Services\Viper\SpecificObjetiveService;


class ViperServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(ProjectInterface::class, ProjectService::class);
        $this->app->bind(FolderInterface::class, FolderService::class);
        $this->app->bind(DocumentInterface::class, DocumentService::class);
        $this->app->bind(ScopeInterface::class,ScopeService::class);
        $this->app->bind(SpecificObjetiveInterface::class,SpecificObjetiveService::class);
    }
}