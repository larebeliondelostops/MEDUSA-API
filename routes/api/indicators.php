<?php

use App\Http\Controllers\IndicatorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['jwt.verify'])->group(function () {
    Route::get('indicator/{indicator}/subindicators', [IndicatorController::class, 'subindicators']);
});
