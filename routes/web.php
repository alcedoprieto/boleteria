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





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('valorboletos', 'valorboletoController')->middleware('auth');

Route::resource('eventos', 'eventoController')->middleware('auth', 'role:admin');

/*Route::resource('boletos', 'boletoController')->middleware('auth');
//Route::resource('eventos.boletos', 'boletoController',[ 'only'=>['show','edit','create']])->middleware('auth', 'role:admin');
//Route::resource('eventos.boletos','boletoController',[ 'only'=>['index','show'] ]);

//Route::resource('eventos', 'EventoController');

Route::get('eventos/{evento}/boletos/create', [
    'as'=>'eventos.boletos.create',
    'uses' => 'boletoController@create'
]);

Route::post('eventos/boletos', [
    'as'=>'eventos.boletos.store',
    'uses' => 'boletoController@store'
]);

Route::post('home/kushki', [
    'as'=>'kushki.pagos',
    'uses' => 'HomeController@kushki'
]);
*/
Route::resource('kushki','HomeController');

Route::resource('boletos', 'boletoController')->middleware('auth', 'role:admin');