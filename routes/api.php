<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\MessageController;

Route::apiResource('/contact', ContactController::class);
Route::apiResource('/contact', ResponseController::class);
Route::apiResource('/contact', MessageController::class);