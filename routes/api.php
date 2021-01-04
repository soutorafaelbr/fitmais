<?php

use App\Http\Controllers\MealsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('meals', MealsController::class);
});
