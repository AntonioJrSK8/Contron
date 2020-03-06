<?php

use App\CentroCusto;
use App\Http\Controllers\CentroCustoController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', 'Dashboard@index')->name('dashboard');
    Route::get('dashboard2', 'Dashboard@indexresponsivo');

    Route::resource('empresa', 'EmpresaController');

    Route::group(['prefix' => 'centrodecusto'], function() {

        Route::get('/', 'CentroCustoController@getCentroCusto')->name('centrodecusto');
        Route::get('getCentroCustoData', 'CentroCustoController@getCentroCustoData');

        Route::get('create', 'CentroCustoController@create')->name('centrocusto.create');       // criar registro
        Route::get('editar/{id}', 'CentroCustoController@edit')->name('centrocusto.edit');      // editar registro
        Route::post('update', 'CentroCustoController@update')->name('centrocusto.update');      // atualizar registro
        Route::post('store', 'CentroCustoController@store')->name('centrocusto.store');         // salvar novo registro
        Route::delete('destroy', 'CentroCustoController@destroy')->name('centrocusto.destroy'); // excluir registro

    });

    Route::group(['prefix' => 'cliente'], function () {

        Route::get('/', 'ClienteController@index')->name('cliente');
        Route::get('getClienteData', 'ClienteController@getClienteData')->name('cliente.getdata');
        Route::get('create', 'ClienteController@create')->name('cliente.create');   // criar registro
        Route::get('editar/{id}', 'ClienteController@edit')->name('cliente.edit');  // editar registro
        Route::post('update', 'ClienteController@update')->name('cliente.update');  // atualizar registro
        Route::post('store', 'ClienteController@store')->name('cliente.store');     // salvar novo registro
        Route::delete('destroy', 'ClienteController@destroy')->name('cliente.destroy'); // excluir registro
    });

    Route::resource('produto', 'ProdutoController');
    Route::resource('menu', 'MenuController');
    Route::post('menu/guardar-ordem', 'MenuController@guardarOrdem')->name('menu.guardar-ordem');

    Route::resource('rol', 'RolController');

});

//Route::get('rol/create', 'PessoasController@create');  // criar registro
//Route::get('rol/{rol}/edit', 'PessoasController@edit');    // editar registro
//Route::get('pessoas/view/{id}', 'PessoasController@view'); // ver registro
//Route::post('pessoas/store', 'PessoasController@store');   // salvar novo registro
//Route::post('pessoas/update', 'PessoasController@update'); // atualizar registro
//Route::post('pessoas/delete', 'PessoasController@delete'); // excluir registro
