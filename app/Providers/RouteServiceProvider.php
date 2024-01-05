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
use Spatie\Multitenancy\TenantFinder\TenantFinder;

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
    public function boot()
    {
        $this->configureRateLimiting();

        if (app()->runningInConsole()) {
            $subdomain = env('APP_ENV', 'local') == 'local' ? 'villavicencio' : 'villavicencio'; // Usar 'local' por defecto si no está definido en .env
            $http = env('APP_ENV') == 'local' ? 'http://' : 'https://'; // Usar 'http://' en entorno local y 'https://' en producción
            $dominio = env('APP_ENV') == 'local' ? '.localhost' : '.medusaapi.online'; // Usar 'localhost' en entorno local y 'medusaapi.online' en producción

            $request = FacadeRequest::create($http . $subdomain . $dominio);
            app()->instance('request', $request);
        }

        $this->routes(function () {
            Route::middleware(['api'])->namespace($this->namespace)->group(function () {
                $this->loadTenantRoutes();
            });

            Route::middleware('web')->namespace($this->namespace)->group(base_path('routes/web.php'));
        });
    }

    protected function loadTenantRoutes()
    {
        if (Schema::hasTable('tenants')) {
            // Obtenemos el subdominio actual
            $subdomain = $this->getSubdomainFromRequest(); // Obtener el subdominio

            // Aquí puedes lógica para determinar la conexión de base de datos basada en el subdominio
            $databaseConnection = $this->getDatabaseConnectionForSubdomain($subdomain);

            // Establecemos la conexión de base de datos
            DB::setDefaultConnection($databaseConnection);
        }

        Route::prefix('api/v1')->group(function () {
            require base_path('routes/api.php');
            require base_path('routes/api/user.php');
            require base_path('routes/api/roles.php');
            //require base_path('routes/api/health.php');
            //require base_path('routes/api/entities.php');
            require base_path('routes/api/events.php');
            require base_path('routes/api/eventsType.php');
            require base_path('routes/api/reports.php');
            //require base_path('routes/api/alarms.php');
           // require base_path('routes/api/cameras.php');
            //require base_path('routes/api/cai.php');
            //require base_path('routes/api/pollingPlace.php');
            require base_path('routes/api/incidents.php');
            require base_path('routes/api/menu.php');
            require base_path('routes/api/allData.php');
            require base_path('routes/api/forms.php');
            require base_path('routes/api/CRUD.php');
            require base_path('routes/api/Viper/DocumentRoutes.php');
            require base_path('routes/api/Viper/FolderRoutes.php');
            // ... otras rutas
        });
    }

    protected function getDatabaseConnectionForSubdomain($subdomain)
    {
        /** @var TenantFinder $tenantFinder */
        $tenantFinder = app(TenantFinder::class);

        $tenant = $tenantFinder->getTenantModel()::where('domain', $subdomain)->first();

        if ($tenant) {
            $tenant->makeCurrent();
            return $tenant->domain; // Devuelve el esquema del inquilino si existe
        } else {
            throw new Exception("Este subdominio no está registrado en nuestro sistema");
        }
    }

    protected function getSubdomainFromRequest()
    {
        $host = request()->getHost(); // Obtener el host completo de la solicitud

        $parsedUrl = parse_url($host);

        // Si el host se divide en partes y tiene al menos tres partes (sub.subdominio.dominio)
        if (isset($parsedUrl['path'])) {

            $parts = explode('.', $parsedUrl['path']);
            if (count($parts) >= 2) {
                // El subdominio es la primera parte del host
                return $parts[0];
            }
        }

        // Si no hay subdominio (solo dominio), devuelve null o lo que necesites
        return null;
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
}
