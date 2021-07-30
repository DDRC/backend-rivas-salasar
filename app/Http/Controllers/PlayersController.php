<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;

class PlayersController extends Controller
{
    /* muestra los juegos de una jugador
     */
    public function index()
    {
        //sql
        $usersList =  DB::select('select * from app.players');
        //query builder
        // $usersList =  DB::table('app.players')->get();
        //eloquent-> trabajo con los modelos creados en laravel
        // $usersList =  Player::get();
        return response()->json(
            [
                'data' => $usersList,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de usuarios correcta',
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
        //sql
        // $respuesta = DB::insert(
        //     'insert into app.players (id,name, nickname,status,gameslist,stadistics)
        //  values (?,?,?,?, ?,?)',
        //     [
        //         $request->id,
        //         $request->name,
        //         $request->nickname,
        //         $request->status,
        //         $request->gameslist,
        //         $request->stadistics,

        //     ]
        // );
        //query builder
        $respuesta = DB::table('app.players')->insert([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'status' => $request->status,
            'gameslist' => $request->gameslist,
            'stadistics' => $request->stadistics,
        ]);
        //eloquent
        // $respuesta = new Player();
        // $respuesta->name = $request->name; //name (1) viene del modelo
        // $respuesta->nickname = $request->nickname; //name (2) viene del cliente y puede ser cambiado facilmente desde el cliente
        // $respuesta->status = $request->status;
        // $respuesta->gameslist = $request->gameslist;
        // $respuesta->stadistics = $request->stadistics;
        // $respuesta->save();

        return response()->json(
            [
                'data' => $respuesta,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'creacion del jugador completa',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /* Muestra un juego de un jugador en teoria
     */
    public function show(Player $player)
    {

        //sql
        // $respuesta = DB::select('select * from app.players where id=?',[$player]);
        // //query builder
        // $respuesta = DB::table('app.players')->where('id', '=', $player)->first();
        //eloquent
        // $respuesta = Player::find($player);
        return response()->json(
            [
                'data' => $player,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de usuarios está correcta',
                    'code' => '200'
                ]
            ],
            200
        );
    }

    /* actualiza un juego de un jugador en teoria
     */
    public function update(Request $request, $player)
    {
        $respuesta = Player::find($player); //primero realizo la busqueda del registro
        $respuesta->name = $request->name;
        $respuesta->nickname = $request->nickname;
        $respuesta->status = $request->status;
        $respuesta->gameslist = $request->gameslist;
        $respuesta->stadistics = $request->stadistics;
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

    /* elimina un juego en teoria
     */
    public function destroy($player)
    {
        $respuesta = Player::find($player);
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
    public function updateUSerState()
    {
        $respuesta = 'user state state updated';
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
