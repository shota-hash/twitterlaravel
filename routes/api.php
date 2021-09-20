<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LikeController;

Route::apiResource('/contact', ContactController::class);
Route::apiResource('/response', ResponseController::class);
Route::apiResource('/message', MessageController::class);
Route::apiResource('/like', LikeController::class);