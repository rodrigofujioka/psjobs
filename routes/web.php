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

Route::group(['prefix' => 'api'], function () {
    Route::get('pessoas', 'PessoaController@index');
    Route::post('pessoas', 'PessoaController@store');
    Route::put('pessoa/{id}', 'PessoaController@update');
    Route::delete('pessoa/{id}', 'PessoaController@destroy');
    Route::get('inscricoes', 'InscricaoController@index');
    Route::post('inscricoes', 'InscricaoController@store');
    Route::delete('inscricao/{id}', 'InscricaoController@destroy');
    Route::get('oportunidades', 'OportunidadeController@index');
    Route::post('oportunidades', 'OportunidadeController@store');
    Route::put('oportunidade/{id}', 'OportunidadeController@update');
    Route::delete('oportunidade/{id}', 'OportunidadeController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('home');
Route::get('/inscritos', 'AdminController@inscritos')->name('inscritos');
Route::get('/atualizar', 'UserController@index')->name('atualizar');
