<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\MessageController;

Route::apiResource('/contact', ContactController::class);
Route::apiResource('/response', ResponseController::class);
Route::apiResource('/message', MessageController::class);
Route::get('/message/like/{id}', 'MessageController@like')->name('message.like');
Route::get('/message/unlike/{id}', 'MessageController@unlike')->name('message.unlike');
