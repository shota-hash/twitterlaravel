<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\MessageController;

Route::apiResource('/contact', ContactController::class);
Route::apiResource('/response', ResponseController::class);
Route::apiResource('/message', MessageController::class);