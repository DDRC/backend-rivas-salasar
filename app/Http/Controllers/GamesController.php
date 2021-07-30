<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Player;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $gamesList = Game::get();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Player $player)
    {

        // $author = new Author();
        // $nationality = Nationality::find($request->nationality['id']);
        // $author->project()->associate($project);
        // $author->nationality()->associate($nationality);

        // $author->names = $request->names;
        // $author->email = $request->email;
        // $author->age = $request->age;
        // $author->phone = $request->phone;
        // $author->identification = $request->identification;

        // $author->save();

        $respuesta=new Game();
        //$player = Player::find($request->player['id']); //para acceder a un Id que se envia por medio del cuerpo de la peticion 
        $respuesta->player()->associate($player); //para los FK el player() debe existir en el modelo el que representara la asociacion
        $respuesta->prize=$request->prize; //name (1) viene del modelo
        $respuesta->state=$request->state; //name (2) viene del cliente y puede ser cambiado facilmente desde el cliente
        $respuesta->owner=$request->owner;
        $respuesta->developer=$request->developer;
        $respuesta->genre=$request->genre;
        $respuesta->title=$request->title;
        $respuesta->releaseDate=$request->releaseDate;
        $respuesta->sold=$request->sold;
        $respuesta->save();
        
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($game)
    {
        $respuesta = Game::find($game);
        return response()->json(
            [
                'data' => $respuesta,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de juegos está correcta',
                    'code' => '200'
                ]
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $game)
    {
        $respuesta=Game::find($game); 
        $respuesta->prize=$request->prize; 
        $respuesta->state=$request->state; 
        $respuesta->owner=$request->owner;
        $respuesta->developer=$request->developer;
        $respuesta->genre=$request->genre;
        $respuesta->title=$request->title;
        $respuesta->releaseDate=$request->releaseDate;
        $respuesta->sold=$request->sold;
        $respuesta->save();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($game)
    {
        $respuesta=Game::find($game);
        $respuesta->delete();
        
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
    public function updateGameState()
    {
        $respuesta = 'game state updated';
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
