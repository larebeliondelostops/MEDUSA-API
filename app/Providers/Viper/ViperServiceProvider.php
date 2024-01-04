<?php 

namespace App\Providers\Viper;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Viper\ProjectInterface;
use App\Services\Viper\ProjectService;

class ViperServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(ProjectInterface::class, ProjectService::class);
    }
}