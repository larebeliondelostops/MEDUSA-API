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
    require base_path('routes/api/videoCameras.php');
    require base_path('routes/api/movementUnits.php');
    require base_path('routes/api/notification.php');

    // Viper Routes
    require base_path('routes/Modules/Viper/DocumentRoutes.php');
    require base_path('routes/Modules/Viper/FolderRoutes.php');
    require base_path('routes/Modules/Viper/ProjectRoutes.php');
    require base_path('routes/Modules/Viper/StageRoutes.php');
    require base_path('routes/Modules/Viper/StateRoutes.php');
    require base_path('routes/Modules/Viper/SubstateRoutes.php');
    require base_path('routes/Modules/Viper/DepartmentRoutes.php');
    require base_path('routes/Modules/Viper/MunicipalityRoutes.php');
    require base_path('routes/Modules/Viper/SectorRoutes.php');
    require base_path('routes/Modules/Viper/SelectsRoutes.php');
    require base_path('routes/Modules/Viper/ScopeRoutes.php');
    require base_path('routes/Modules/Viper/SpecificObjectiveRoutes.php');
    require base_path('routes/Modules/Viper/AlertRoutes.php');
    require base_path('routes/Modules/Viper/IndicatorRoutes.php');
    require base_path('routes/Modules/Viper/MeasurementUnitRoutes.php');
    require base_path('routes/Modules/Viper/DeliverableRoutes.php');
    require base_path('routes/Modules/Viper/ProductRoutes.php');
    require base_path('routes/Modules/Viper/ActivityRoutes.php');
    require base_path('routes/Modules/Viper/PrecedenceRoutes.php');
    require base_path('routes/Modules/Viper/LocationRoutes.php');
    require base_path('routes/Modules/Viper/MilestoneRoutes.php');
    require base_path('routes/Modules/Viper/MilestoneClassRoutes.php');
    require base_path('routes/Modules/Viper/MilestoneSubclassRoutes.php');
    require base_path('routes/Modules/Viper/ProofRoutes.php');
    require base_path('routes/Modules/Viper/ScheduleRoutes.php');
    require base_path('routes/Modules/Viper/ReportRoutes.php');
    require base_path('routes/Modules/Viper/ProjectContractRoutes.php');
    require base_path('routes/Modules/Viper/ProjectUserRoleRoutes.php');

    require base_path('routes/Modules/Viper/TrackingMatrixRoutes.php');

    require base_path('routes/Modules/Viper/ImprovementPlanRoutes.php');

    // Notification Route
    require base_path('routes/api/notification.php');

    // Heatmap Route
    require base_path('routes/api/heatmap.php');

    // Import KMZ Route
    require base_path('routes/api/kmz.php');

});
