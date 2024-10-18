<?php

namespace App\Providers;

use App\Interfaces\Modules\hackathon\IncidentInterface;
use App\Models\Villavicencio\Incident;
use App\Observers\Modules\hackathon\IncidentObserver;
use App\Services\Cruds\CrudService;
use App\Services\Modules\hackathon\IncidentService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\Cruds\CrudInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\Reports\ReportService;
use App\Services\Markers\MarkersService;
use App\Interfaces\Markers\MarkersInterface;
use App\Interfaces\Reports\ReportInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MarkersInterface::class, MarkersService::class);
        $this->app->bind(CrudInterface::class, CrudService::class);
        $this->app->bind(ReportInterface::class, ReportService::class);

        // hackathon
        $this->app->bind(IncidentInterface::class, IncidentService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        Incident::observe(IncidentObserver::class);
    }
}
