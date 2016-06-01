<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Pessoa
Route::group(['prefix'=>'pessoa'], function() {

    Route::get('', 'Pessoa\PessoaController@index'); // Listar Pessoas
    Route::get('novo', function(){return view('pessoa.cadastro');}); // Nova Pessoa
    Route::post('cadastro', 'Pessoa\PessoaController@novaPessoa'); // Cria no banco nova pessoa
    Route::get('{id}/editar', ['as' => 'pessoa.editar', 'uses'=>'Pessoa\PessoaController@editar'])->where('id', '[0-9]+'); // Recebe id da pessoa a editar
    Route::put('{id}/atualizar', ['as'=> 'pessoa.atualizar', 'uses'=>'Pessoa\PessoaController@atualizar'])->where('id', '[0-9]+'); // Envia vetor com dados a atualizar
    Route::get('{id}/excluir', ['as' => 'pessoa.excluir', 'uses'=>'Pessoa\PessoaController@excluir'])->where('id', '[0-9]+'); // Recebe id da pessoa a editar

});

// Usuario
Route::group(['prefix'=>'usuario'], function() {

    Route::get('', 'Usuario\usuarioController@index'); // Listar
    Route::post('cadastro', 'Usuario\usuarioController@criaUsuario'); // Cria no banco

});


Route::get('/', function () {
    return view('auth.login');
});


// Authentication routes...
Route::post('login', 'Auth\AuthController@authenticate');
