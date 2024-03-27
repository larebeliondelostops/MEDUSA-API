<?php

use App\Http\Controllers\EventController;
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

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de eventos
     */

    Route::post('evento/create', [EventController::class, 'createEvent']);
    Route::get('evento/all', [EventController::class, 'getAllEvents']);
    Route::get('evento/tipo_evento', [EventController::class, 'getEventsType']);
    Route::get('evento/date', [EventController::class, 'getEventsForDate']);
    Route::delete('evento/delete/{id}', [EventController::class, 'deleteEvent']);

    //endpoints para reportes

    Route::get('evento/EventsForMonth', [EventController::class, 'EventsForMonth']);
    Route::get('evento/EventsForType', [EventController::class, 'EventsForType']);
    Route::get('evento/EventsPastAndFuture', [EventController::class, 'EventsPastAndFuture']);
    Route::get('evento/EventsByAuthorizingEntity', [EventController::class, 'EventsByAuthorizingEntity']);
    Route::get('evento/EventsByCapacityRange', [EventController::class, 'EventsByCapacityRange']);
    Route::get('evento/EventsByTypeAndAuthorizingEntity', [EventController::class, 'EventsByTypeAndAuthorizingEntity']);

    //endpoints temporales para modelo probabilistico georeferenciado

    Route::post('modeloprobabilistico/ProbabilisticGrid', [ProbabilisticController::class, 'obtenerCuadriculaProbabilisticaGeneral']);
    Route::post('modeloprobabilistico/Indicators', [ProbabilisticController::class, 'GetIndicators']); 
    Route::get('modeloprobabilistico/ProbabilisticGrid/{id}', [ProbabilisticController::class, 'obtenerCuadriculaProbabilisticaPorIndicador']);
    Route::post('modeloprobabilistico/GridInformation', [ProbabilisticController::class, 'obtenerEstadisticasPorCuadricula']);
    
    //endpoints temporales para modelo probabilistico no georeferenciado

    Route::get('modeloprobabilistico/tabs', [ProbabilisticController::class, 'getTaps']);
    Route::post('modeloprobabilistico/type', [ProbabilisticController::class, 'type']);

    //endpoints temporales para modelo probabilisito de movilidad IPATS
    // Route::get('modeloprobabilistico/ProbabilisticGridIpats', [ProbabilisticController::class, 'obtenerCuadriculaProbabilisticaGeneralMovilidad']);
    // Route::get('modeloprobabilistico/ProbabilisticGridIpats/{id}', [ProbabilisticController::class, 'obtenerEstadisticasPorCuadricula']);

});