<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController; //! Não entendi porque esse App tem que ser maiusculo, talvez seja porque no provider esta assim


Route::get('/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/{id}', [EventController::class, 'show']);
Route::get('/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::post('/', [EventController::class, 'store']);
Route::delete('/{id}', [EventController::class, 'destroy'])->middleware('auth');
