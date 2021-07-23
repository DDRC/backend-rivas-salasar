<?php

use Illuminate\Support\Facades\Route;

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

Route::get('players/{playerID}/games', function () {
    return ['COD Modern Warfare', 'Horizon Zero Dawn','Warhammer 4000'];
});
Route::get('players/{playerID}/games/{gameID}', function () {
    return 'KoF 2003';
});
Route::post('players/{playerID}/games', function () {
    return 'fetching games list';
});
Route::put('players/{playerID}/games/{gameID}', function () {
    return 'game updated!!';
});
Route::delete('players/{playerID}/games/{gameID}', function () {
    return 'game deleted your set';
});