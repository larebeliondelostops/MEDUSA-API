<?php

use App\Http\Controllers\Viper\DeliverableController;
use Illuminate\Support\Facades\Route;

Route::prefix("/viper/deliverable")->group(function () {
    Route::post('/create', [DeliverableController::class, 'store']);
    Route::put('/update/{deliverableId}', [DeliverableController::class, 'update']);
    Route::get('/list', [DeliverableController::class, 'index']);
    Route::get('/get/{productId}', [DeliverableController::class, 'show']);
    Route::delete('/delete/{deliverableId}', [DeliverableController::class, 'destroy']);
});
