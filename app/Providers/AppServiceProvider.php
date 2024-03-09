<?php

namespace App\Providers;

use App\Interfaces\Cruds\CrudInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\Markers\MarkersService;
use App\Interfaces\Markers\MarkersInterface;
use App\Services\Cruds\CrudService;

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
    }
}
