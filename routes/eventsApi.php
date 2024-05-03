<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiEventController;


Route::get('/', [ApiEventController::class, 'index']);
Route::post('/', [ApiEventController::class, 'store']);
Route::get('/{id}', [ApiEventController::class, 'show']);
