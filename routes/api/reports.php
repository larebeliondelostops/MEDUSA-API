<?php

use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ProbabilisticController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes Events
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de eventos
|
*/

Route::middleware([/* 'jwt.verify' *//* , 'role:Administrador' */])->group(function() {


    //endpoints para reportes

    Route::get('reporte/EventsForMonth', [ReportsController::class, 'EventsForMonth']);
    Route::get('reporte/EventsForType', [ReportsController::class, 'EventsForType']);
    Route::get('reporte/EventsPastAndFuture', [ReportsController::class, 'EventsPastAndFuture']);
    Route::get('reporte/EventsByAuthorizingEntity', [ReportsController::class, 'EventsByAuthorizingEntity']);
    Route::get('reporte/EventsByCapacityRange', [ReportsController::class, 'EventsByCapacityRange']);
    Route::get('reporte/EventsByTypeAndAuthorizingEntity', [ReportsController::class, 'EventsByTypeAndAuthorizingEntity']);
    Route::get('reporte/getReportsData', [ReportsController::class, 'getReportsData']);

    //endpoints para criminalidad

    Route::get('reporte/StatisticsByIndicatorAndGrid', [ReportsController::class, 'StatisticsByIndicatorAndGrid']);
    Route::get('reporte/StatisticsGeneral', [ReportsController::class, 'StatisticsGeneral']);

    Route::post('report/{method}/{slug}', [ReportsController::class, 'index']);
});