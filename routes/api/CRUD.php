<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;

/*
|--------------------------------------------------------------------------
| API Routes alarms
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de entidades
|
*/

Route::middleware([/* 'jwt.verify' */])->group(function() {
    /**
     * Manejo de entidades
     */
    Route::get('{slug}/all', [CRUDController::class, 'all']);
    Route::get('{slug}/allTable', [CRUDController::class, 'allTable']);
    Route::get('{slug}/get/{id}', [CRUDController::class, 'get']);
    Route::post('{slug}/store', [CRUDController::class, 'store']);
    Route::put('{slug}/update/{id}', [CRUDController::class, 'update']);
    Route::delete('{slug}/destroy/{id}', [CRUDController::class, 'destroy']);
});