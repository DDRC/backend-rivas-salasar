<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\GamesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('Rivas');
});


Route::apiResource('players', PlayersController::class);
Route::apiResource('players.games', GamesController::class);
// actualizacion estado usuario
Route::prefix('player')->group(function () {
    Route::prefix('{player}')->group(function () {
        Route::patch('states', [PlayersController::class, 'updateUserState']);
    });
    Route::prefix('')->group(function () {
        Route::get('states', [PlayersController::class, 'updateUserState']);
    });
});
// actualizacion estado juego
Route::prefix('player/{player}/games')->group(function () {
    Route::prefix('{game}')->group(function () {
        Route::patch('states', [GamesController::class, 'updateGameState']);
    });
    Route::prefix('')->group(function () {
        Route::get('states', [GamesController::class, 'updateGameState']);
    });
});
