<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/clientes', 'App\Http\Controllers\ClienteController@index');
Route::get('/clientes/create', 'App\Http\Controllers\ClienteController@create');
Route::post('/clientes', 'App\Http\Controllers\ClienteController@store');
Route::put('/clientes/{cliente}', 'App\Http\Controllers\ClienteController@update');
Route::get('/clientes/{cliente}/edit', 'App\Http\Controllers\ClienteController@edit');
Route::delete('/clientes/{cliente}', 'App\Http\Controllers\ClienteController@destroy');

Route::get('/pedidos/export', 'App\Http\Controllers\PedidoController@export');
Route::get('/pedidos', 'App\Http\Controllers\PedidoController@index');
Route::get('/pedidos/create', 'App\Http\Controllers\PedidoController@create');
Route::get('/pedidos/{pedido}', 'App\Http\Controllers\PedidoController@show');
Route::post('/pedidos', 'App\Http\Controllers\PedidoController@store');
Route::get('/pedidos/{pedido}/edit', 'App\Http\Controllers\PedidoController@edit');
Route::put('/pedidos/{pedido}', 'App\Http\Controllers\PedidoController@update');
Route::delete('/pedidos/{pedido}', 'App\Http\Controllers\PedidoController@destroy');