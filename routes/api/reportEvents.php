<?php

use App\Http\Controllers\ReportEventsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes ReportHealth
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de reportes de salud
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de centros de reportes de salud
     */
    Route::get('reportEvent/EventosMes', [ReportEventsController::class, 'EventosMes']); // Obtener todos los campos de la tabla salud
    Route::get('reportEvent/EventosPorTipo', [ReportEventsController::class, 'EventosPorTipo']); 
    Route::get('reportEvent/EventosPasadosYFuturos', [ReportEventsController::class, 'EventosPasadosYFuturos']); 
    Route::get('reportEvent/EventosPorEntidadAutorizadora', [ReportEventsController::class, 'EventosPorEntidadAutorizadora']); 
    Route::get('reportEvent/EventosPorRangoDeCapacidad', [ReportEventsController::class, 'EventosPorRangoDeCapacidad']); 
    Route::get('reportEvent/EventosPorTipoYEntidadAutorizadora', [ReportEventsController::class, 'EventosPorTipoYEntidadAutorizadora']); 
});