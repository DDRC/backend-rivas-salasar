<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashiersController;

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

/*
Route::get('projects',function (){
    return response()->json(
      [
          'data' => $computers,
          'msg' => [
              'summary' => 'consulta correcta',
              'detail' => 'la consulta  esta correcta',
              'code' => '201'
          ]

      ],201
  );
});
 Route::get('projects/{project}',function (){
   return response()->json(
      [
          'data' => $computers,
          'msg' => [
              'summary' => 'consulta correcta',
              'detail' => 'la consulta es correcta ♥',
              'code' => '200'
          ]

      ],200
  );
});

 Route::post('projects/',function (){
   return response()->json(
      [
          'data' => null,
          'msg' => [
              'summary' => 'creacion correcta',
              'detail' => 'el dato ha sido creado',
              'code' => '201'
          ]

      ],201
  );
});
 Route::put('projects/{proyect}',function (){
   return response()->json(
      [
          'data' => null,
          'msg' => [
              'summary' => 'actualizacion correcta',
              'detail' => 'los datos se han actualizado',
              'code' => '201'
          ]

      ],201
  );
});

 Route::delete('projects/{proyect}',function (){
   return response()->json(
      [
          'data' => $computers,
          'msg' => [
              'summary' => 'eliminacion correcta',
              'detail' => 'dato eliminado',
              'code' => '201'
          ]

      ],201
  );
});


//Relacionados

Route::get('cashiers/{cashier}/computers',function (){
    return ['cashier1','cashier2','cashier3'];
 });

Route::get('cashiers/{cashier}/computers/{computer}', function () {
   return ['cashier1', 'cashier2', 'cashier3'];
});

Route::post('cashiers/{cashier}/computers',function (){
    return 'logeado correctamente';
 });

 Route::put('cashiers/{cashier}/computers/{computer}',function (){
    return 'logeo actualizado';
 });

 Route::delete('cashiers/{cashier}/computers/{computer}',function (){
    return 'logeo eliminado';
 });
*/

Route::apiResource('cashiers', CashiersController::class);
// actualizacion estado 
Route::prefix('cashier')->group(function () {
    Route::prefix('{cashier}')->group(function () {
        Route::patch('states', [CashiersController::class, 'updateState']);
    });
    Route::prefix('')->group(function () {
        Route::patch('states', [CashiersController::class, 'updateState']);
    });
});
// consulta computadoras de una cajera
Route::prefix('cashiers')->group(function () { 
    Route::prefix('{cashier}')->group(function () {  
        Route::prefix('computers')->group(function () {  
            Route::get('', [CashiersController::class, 'index']); 
        });
    });
});
// consulta una computadora  de una cajera
Route::prefix('cashiers')->group(function () {  
    Route::prefix('{cashier}')->group(function () { 
        Route::prefix('computers')->group(function () {  
            Route::get('{computer}', [CashiersController::class, 'show']); 
        });
    });
});
// crea una computadora  para una cajera
Route::prefix('cashiers')->group(function () { 
    Route::prefix('{cashier}')->group(function () {  
        Route::prefix('computers')->group(function () {  
            Route::post('', [CashiersController::class, 'store']); 
        });
    });
});
// actualiza una computadora de una cajera
Route::prefix('cashiers')->group(function () { 
    Route::prefix('{cashier}')->group(function () {  
        Route::prefix('computers')->group(function () {  
            Route::put('{computer}', [CashiersController::class, 'update']); 
        });
    });
});
// elimina una computadora de una cajera
Route::prefix('cashiers')->group(function () {  
    Route::prefix('{cashier}')->group(function () {  
        Route::prefix('computers')->group(function () {
            Route::delete('{computer}', [CahiersController::class, 'destroy']);
        });
    });
});
