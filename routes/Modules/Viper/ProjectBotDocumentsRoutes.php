<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ProjectBotDocumentsController;


Route::prefix('/viper/projectBotDocuments')->group(function () {
    Route::post('/create', [ProjectBotDocumentsController::class, 'store']);
    Route::get('/{bpin}', [ProjectBotDocumentsController::class, 'index']);
});
