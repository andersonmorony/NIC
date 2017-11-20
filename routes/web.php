<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cadastro/exemplo', 'Cadastro\\ExemploController');
Route::resource('cadastro/exemplo2', 'Cadastro\\Exemplo2Controller');
Route::resource('cadastro/projeto', 'Cadastro\\ProjetoController');
Route::get('/listar-projetos-convidados', 'Cadastro\ListarProjetosConvidadoController@index');
Auth::routes();
Route::resource('/home', 'Cadastro\\ProjetoController');

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('cadastro/usuario', 'cadastro\\UsuarioController');
Route::get('/adicionar-avaliador', 'Cadastro\ConvidarAvaliadorController@avaliador');
Route::post('/escolherProjeto', 'Cadastro\ConvidarAvaliadorController@escolherProjeto');
Route::resource('cadastro/pontuar-projeto', 'Cadastro\\PontuarProjetoController');
Route::get('/pontuar', 'Cadastro\PontuarProjetoController@pontuar_projeto');
