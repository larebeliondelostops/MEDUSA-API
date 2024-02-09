<?php

namespace App\Providers;

use Exception;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Support\Facades\Request as FacadeRequest;
use Illuminate\Support\Facades\Schema;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */


    protected function loadTenantRoutes()
    {
        Route::prefix('api/v1')->group(function () {
            require base_path('routes/api.php');
            require base_path('routes/api/user.php');
            require base_path('routes/api/roles.php');
            require base_path('routes/api/events.php');
            require base_path('routes/api/eventsType.php');
            require base_path('routes/api/reports.php');
            require base_path('routes/api/incidents.php');
            require base_path('routes/api/menu.php');
            require base_path('routes/api/allData.php');
            require base_path('routes/api/forms.php');
            require base_path('routes/api/CRUD.php');
            // Viper Routes
            require base_path('routes/api/Viper/DocumentRoutes.php');
            require base_path('routes/api/Viper/FolderRoutes.php');
            require base_path('routes/api/Viper/ProjectRoutes.php');
            require base_path('routes/api/Viper/StageRoutes.php');
            require base_path('routes/api/Viper/StateRoutes.php');
            require base_path('routes/api/Viper/SubstateRoutes.php');
            require base_path('routes/api/Viper/DepartmentRoutes.php');
            require base_path('routes/api/Viper/MunicipalityRoutes.php');
            require base_path('routes/api/Viper/SectorRoutes.php');
            require base_path('routes/api/Viper/SelectsRoutes.php');
            require base_path('routes/api/Viper/ScopeRoutes.php');
            require base_path('routes/api/Viper/SpecificObjectiveRoutes.php');
            require base_path('routes/api/Viper/AlertRoutes.php');
            require base_path('routes/api/Viper/IndicatorRoutes.php');
            require base_path('routes/api/Viper/MeasurementUnitRoutes.php');
            require base_path('routes/api/Viper/DeliverableRoutes.php');
            require base_path('routes/api/Viper/ProductRoutes.php');
            require base_path('routes/api/Viper/ActivityRoutes.php');
            require base_path('routes/api/Viper/PrecedenceRoutes.php');
        });
    }

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $this->mapApiRoutes();
            $this->mapWebRoutes();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    protected function mapWebRoutes()
    {
        foreach ($this->centralDomains() as $domain) {
            Route::middleware('web')
                ->domain($domain)
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        }
    }

    protected function mapApiRoutes()
    {
        foreach ($this->centralDomains() as $domain) {
            Route::prefix('api')
                ->domain($domain)
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        }
    }

    protected function centralDomains(): array
    {
        return config('tenancy.central_domains');
    }
}
