<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashiersController extends Controller
{
    
    public function index()
    {
        $computersList = ['computer1', 'computer2', 'computer3'];
    return response()->json(
        [
            'data' => $computersList,
            'msg' => [
                'summary' => 'consulta correcta',
                'detail' => 'la consulta de computadoras es correcta',
                'code' => '200'
            ]
        ],
        200
    );
    }

   
    public function store(Request $request)
    {
        $respuesta='computer creation completed';
        return response()->json(
                    [
                        'data' => $respuesta,
                        'msg' => [
                            'summary' => 'consulta correcta',
                            'detail' => 'creacion de computadora completa',
                            'code' => '201'
                        ]
                    ],
            201
         );
    }

    public function show($id)
    {
        $computer = 'computer 1';
    return response()->json(
        [
            'data' => $computer,
            'msg' => [
                'summary' => 'consulta correcta',
                'detail' => 'la consulta de la omputadora es correcta',
                'code' => '200'
            ]
        ],
        200
    );
    }


    public function update(Request $request, $id)
    {
        return response()->json(
                    [
                        'data' => null,
                        'msg' => [
                            'summary' => 'consulta correcta',
                            'detail' => 'actualización exitosa',
                            'code' => '201'
                        ]
                    ],
                    201
                );
    }

   
    public function destroy($id)
    {
        $respuesta='computer delate';
        return response()->json(
                    [
                        'data' => $respuesta,
                        'msg' => [
                            'summary' => 'consulta correcta',
                            'detail' => 'eliminacion completa',
                            'code' => '201'
                        ]
                    ],
                    201
                );
    }
    
    public function updateState()
    {
        $respuesta='computer state updated';
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
