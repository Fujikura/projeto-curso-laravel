<?php

use Illuminate\Support\Facades\autenticador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Listar series

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

//form de series
Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie')
    ->middleware('autenticador');

//salvar uma serie    
Route::post('/series/criar', 'SeriesController@store')
    ->middleware('autenticador');

//remover serie
Route::delete('/series/{id}', 'SeriesController@destroy')
    ->middleware('autenticador');
    
//edita nome da serie
Route::post('/series/{id}/edita-nome', 'SeriesController@editaNome');


//lista temporadas
Route::get('/series/{id}/temporadas', 'TemporadasController@index');


//lista episodios da temporada
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');


//marca episodios como assistido
Route::post('//temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
    ->middleware('autenticador');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');


//acesso a tela de login
Route::get('/entrar', 'EntrarController@index')
    ->name('entrar');

//realiza login
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistrarController@create');

Route::post('/registrar', 'RegistrarController@store');

//realiza logout
Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});


