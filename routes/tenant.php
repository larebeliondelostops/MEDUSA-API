<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->prefix('api/v1')->group(function () {
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
});
