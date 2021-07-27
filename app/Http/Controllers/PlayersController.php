<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /* muestra los juegos de una jugador
     */
    public function index()
    {
        $gamesList = ['COD Modern Warfare', 'Horizon Zero Dawn', 'Warhammer 4000'];
    return response()->json(
        [
            'data' => $gamesList,
            'msg' => [
                'summary' => 'consulta correcta',
                'detail' => 'la consulta de juegos correcta',
                'code' => '200'
            ]
        ],
        200
    );
    }

    /* añade un juego a la coleccion de un jugador en teoria
     */
    public function store(Request $request)
    {
        $respuesta='game creation completed';
        return response()->json(
                    [
                        'data' => $respuesta,
                        'msg' => [
                            'summary' => 'consulta correcta',
                            'detail' => 'creacion del juego completa',
                            'code' => '201'
                        ]
                    ],
                    201
                );
    }

    /* Muestra un juego de un jugador en teoria
     */
    public function show($id)
    {
        $game = 'KoF 2003';
    return response()->json(
        [
            'data' => $game,
            'msg' => [
                'summary' => 'consulta correcta',
                'detail' => 'la consulta de juegos está correcta',
                'code' => '200'
            ]
        ],
        200
    );
    }

    /* actualiza un juego de un jugador en teoria
     */
    public function update(Request $request, $id)
    {
        return response()->json(
                    [
                        'data' => null,
                        'msg' => [
                            'summary' => 'consulta correcta',
                            'detail' => 'actualización con exito',
                            'code' => '201'
                        ]
                    ],
                    201
                );
    }

    /* elimina un juego en teoria
     */
    public function destroy($id)
    {
        $respuesta='game deleted from your set';
        return response()->json(
                    [
                        'data' => $respuesta,
                        'msg' => [
                            'summary' => 'consulta correcta',
                            'detail' => 'eliminacion completada',
                            'code' => '201'
                        ]
                    ],
                    201
                );
    }
    /* Actualiza el estado de un juego  de un jugador en teoria
     */
    public function updateState()
    {
        $respuesta='game state updated';
        return response()->json(
                    [
                        'data' => $respuesta,
                        'msg' => [
                            'summary' => 'actualización correcta',
                            'detail' => 'actualizacion del estado completada',
                            'code' => '201'
                        ]
                    ],
                    201
                );
    }
}
