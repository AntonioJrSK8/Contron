<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('api')->name('api.')->group(function(){
    Route::get('/empresa', 'EmpresaController@index')->name('empresa');
    Route::get('/centrocusto', 'CentroCustoController@index')->name('centrocusto');
    Route::get('/cliente','ClienteController@index')->name('cliente');
    Route::get('/produto','ProdutoController@index')->name('produto');
});

//Route::apiResource('getEmpresa', 'api\EmpresaController');
//Route::apiResource('getProduto', 'api\ProdutoController');
//Route::apiResource('getCliente', 'api\ClienteController');
//Route::apiResource('getCentroCusto', 'api\CentroCustoController');

