<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\PrecedenceController;

/*
|--------------------------------------------------------------------------
| API Routes Precedence
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de Precedences en el proyecto
|
*/

Route::prefix('/viper/precedence')->group(function () {
    Route::get('/list', [PrecedenceController::class, 'index']);
    Route::get('/get/{precedenceId}', [PrecedenceController::class, 'show']);
    Route::post('/create', [PrecedenceController::class, 'store']);
    Route::put('/update/{precedenceId}', [PrecedenceController::class, 'update']);
    Route::delete('/delete/{precedenceId}', [PrecedenceController::class, 'destroy']);
});