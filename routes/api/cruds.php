<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

/*
|--------------------------------------------------------------------------
| API Routes Crud's
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Crud's dinamicos
|
*/

/* Route::middleware()->group(function() {
    Route::get('{slug}/all', [CrudController::class, 'all']);
    Route::get('{slug}/allTable', [CrudController::class, 'allTable']);
    Route::get('{slug}/get/{id}', [CrudController::class, 'get']);
    Route::post('{slug}/store', [CrudController::class, 'store']);
    Route::put('{slug}/update/{id}', [CrudController::class, 'update']);
    Route::delete('{slug}/destroy/{id}', [CrudController::class, 'destroy']);
}); */

Route::middleware(['jwt.verify'])->controller(CrudController::class)->group(function () {
    Route::get('{slug}/allTable', 'index');
    Route::get('{slug}/get/{id}', 'show');
    Route::post('{slug}/store', 'store');
    Route::put('{slug}/update/{id}', 'update');
    Route::delete('{slug}/destroy/{id}', 'destroy');
});