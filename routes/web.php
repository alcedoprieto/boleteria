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
    return view('template');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('valorboletos', 'valorboletoController')->middleware('auth');

//Route::resource('eventos', 'eventoController')->middleware('auth', 'role:admin');

// Agregando seguridad por Roles
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('eventos', 'EventoController');
});

Route::resource('eventos.boletos', 'eventoBoletoController', [ 'only'=>['index'] ])->middleware('auth');

Route::resource('boletos.tickets', 'boletosTicketsController', [ 'only'=>['index'] ])->middleware('auth');

// Route::get('eventos/{id}/ventas', [
//     'as'=>'eventos.ventas',
//     'uses' => 'eventoController@ventas'
// ])->middleware('auth');

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
<<<<<<< HEAD
]);*

Route::post('home/kushki', [
    'as'=>'kushki.pagos',
    'uses' => 'HomeController@kushki'
]);
*/


Route::resource('boletos', 'boletoController')->middleware('auth', 'role:admin');