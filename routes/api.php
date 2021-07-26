<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});


Route::get('projects',function (){
    return ['proyecto1','proyecto2'];
 });
 Route::get('projects/{project}',function (){
    return ['proyecto1','proyecto2'];
 });

 Route::post('projects/',function (){
    return 'creado correctamente';
 });
 Route::put('projects/{proyect}',function (){
    return 'actualizado';
 });

 Route::delete('projects/{proyect}',function (){
   return 'eliminado';
});

//Relacionados

Route::get('cashiers',function (){
    return ['cashier1','cashier2'];
 });

Route::get('cashiers/{cashier}/computers/{computer}', function () {
   return ['cashier1', 'cashier2', 'cashier3'];
});

Route::post('cashiers/',function (){
    return 'logeado correctamente';
 });

 Route::put('cashiers/{cashier}/computers/{computer}',function (){
    return 'logeo actualizado';
 });

 Route::delete('cashiers/{cashier}/computers/{computer}',function (){
    return 'logeo eliminado';
 });
 