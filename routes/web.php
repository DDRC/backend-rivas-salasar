<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayersController;
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

// Route::get('players/{player}/games', function () {
//     $gamesList = ['COD Modern Warfare', 'Horizon Zero Dawn', 'Warhammer 4000'];
//     return responce()->json(
//         [
//             'data' => $gamesList,
//             'msg' => [
//                 'summary' => 'consulta correcta',
//                 'detail' => 'la consulta de proyectos está correcta',
//                 'code' => '200'
//             ]
//         ],
//         200
//     );
// });
// Route::get('players/{player}/games/{game}', function () {
//     $game = 'KoF 2003';
//     return responce()->json(
//         [
//             'data' => $game,
//             'msg' => [
//                 'summary' => 'consulta correcta',
//                 'detail' => 'la consulta de proyectos está correcta',
//                 'code' => '200'
//             ]
//         ],
//         200
//     );
// });
// Route::post('players/{player}/games', function () {
//     return responce()->json(
//         [
//             'data' => 'fetching games list',
//             'msg' => [
//                 'summary' => 'consulta correcta',
//                 'detail' => 'la consulta de proyectos está correcta',
//                 'code' => '201'
//             ]
//         ],
//         201
//     );

// });
// Route::put('players/{player}/games/{game}', function () {
//     return responce()->json(
//         [
//             'data' => 'game updated!!',
//             'msg' => [
//                 'summary' => 'consulta correcta',
//                 'detail' => 'la consulta de proyectos está correcta',
//                 'code' => '201'
//             ]
//         ],
//         201
//     );

// });
// Route::delete('players/{player}/games/{game}', function () {
//     return responce()->json(
//         [
//             'data' => 'game deleted from your set',
//             'msg' => [
//                 'summary' => 'consulta correcta',
//                 'detail' => 'la consulta de proyectos está correcta',
//                 'code' => '201'
//             ]
//         ],
//         201
//     );

// });

Route::apiResource('players', PlayersController::class);
// actualizacion estado juego
Route::prefix('player')->group(function () {
    Route::prefix('{player}')->group(function () {
        Route::patch('states', [PlayersController::class, 'updateState']);
    });
    Route::prefix('')->group(function () {
        Route::patch('states', [PlayersController::class, 'updateState']);
    });
});
// consulta juegos de un jugador
Route::prefix('players')->group(function () {  //busca la ruta players
    Route::prefix('{player}')->group(function () {  //busca un parametro variable player->id jugador
        Route::prefix('games')->group(function () {  //busca los juegos de un jugador
            Route::get('', [PlayersController::class, 'index']); //muestra los juegos del jugador
        });
    });
});
// consulta un juego de un jugador
Route::prefix('players')->group(function () {  //busca la ruta players
    Route::prefix('{player}')->group(function () {  //busca un parametro variable player->id jugador
        Route::prefix('games')->group(function () {  //busca los juegos de un jugador
            Route::get('{game}', [PlayersController::class, 'show']); //muestra un juegos del jugador
        });
    });
});
// crea un juego para un jugador
Route::prefix('players')->group(function () {  //busca la ruta players
    Route::prefix('{player}')->group(function () {  //busca un parametro variable player->id jugador
        Route::prefix('games')->group(function () {  //busca los juegos de un jugador
            Route::post('', [PlayersController::class, 'store']); //muestra un mensake de creacion del juego
        });
    });
});
// actualiza un juego de un jugador
Route::prefix('players')->group(function () {  //busca la ruta players
    Route::prefix('{player}')->group(function () {  //busca un parametro variable player->id jugador
        Route::prefix('games')->group(function () {  //busca los juegos de un jugador
            Route::put('{game}', [PlayersController::class, 'update']); //muestra un mensaje de actualizacion
        });
    });
});
// elimina un juego de un jugador
Route::prefix('players')->group(function () {  //busca la ruta players
    Route::prefix('{player}')->group(function () {  //busca un parametro variable player->id jugador
        Route::prefix('games')->group(function () {  //busca los juegos de un jugador
            Route::delete('{game}', [PlayersController::class, 'destroy']); //muestra un mensaje de eliminacion
        });
    });
});


