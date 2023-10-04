<?php

use App\Http\Controllers\ReportController;
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

    Route::get('reporte/EventsForMonth', [ReportController::class, 'EventsForMonth']);
    Route::get('reporte/EventsForType', [ReportController::class, 'EventsForType']);
    Route::get('reporte/EventsPastAndFuture', [ReportController::class, 'EventsPastAndFuture']);
    Route::get('reporte/EventsByAuthorizingEntity', [ReportController::class, 'EventsByAuthorizingEntity']);
    Route::get('reporte/EventsByCapacityRange', [ReportController::class, 'EventsByCapacityRange']);
    Route::get('reporte/EventsByTypeAndAuthorizingEntity', [ReportController::class, 'EventsByTypeAndAuthorizingEntity']);
    Route::get('reporte/getReportsData', [ReportController::class, 'getReportsData']);

    //endpoints para criminalidad

    Route::get('reporte/StatisticsByIndicatorAndGrid', [ReportController::class, 'StatisticsByIndicatorAndGrid']);
    Route::get('reporte/StatisticsGeneral', [ReportController::class, 'StatisticsGeneral']);

    Route::get('report/{slug}/{method}', [ReportController::class, 'index']);
});