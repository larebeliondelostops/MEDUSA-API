<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes Product
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Products en el proyecto
|
*/

Route::prefix('/viper/product')->group(function () {
    Route::get('/list/project/{projectId}', [ProductController::class, 'index']);
    Route::get('/list/scope/{scopeId}', [ProductController::class, 'indexByScope']);
    Route::get('/get/{ProductId}', [ProductController::class, 'show']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::get('/list/specificObjective/{specificObjective}', [ProductController::class, 'indexBySpecificObjective']);
    Route::put('/update/{ProductId}', [ProductController::class, 'update']);
    Route::delete('/delete/{ProductId}', [ProductController::class, 'destroy']);
});