<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController; //! Não entendi porque esse App tem que ser maiusculo, talvez seja porque no provider esta assim


Route::get('/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/{id}', [EventController::class, 'show']);
Route::post('/', [EventController::class, 'store']);
