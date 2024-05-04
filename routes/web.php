<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController; //! Não entendi porque esse App tem que ser maiusculo, talvez seja porque no provider esta assim

Route::get('/', [EventController::class, 'index']);
//web.php file
Route::prefix('/events')->group(__DIR__ . '/events.php');

Route::get('/teste', function () {
    $nome = 'caio';
    $nome = 1;

    return view('teste', ['name' => $nome]);
});
Route::get('/teste-params/{id?}', function ($id = 1) {

    return view('teste-params', ['parametro' => $id]);
});
Route::get('/teste-search', function () {

    $search = request('search');

    $teste = request('teste');

    return view('teste-search', ['search' => $search, 'teste' => $teste]);
});


Route::get('/blade', function () {
    return view('welcome');
});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');




// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/events/dashboard', function () {
//         return view('events.dashboard');
//     })->name('events.dashboard');
// });
