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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/paginateste', function(){
	return view('novoteste');
});
Route::group(['middleware' => ['web']], function(){
    Route::resource('clientes', 'ClientesController');
});


Route::get('/api/v1/clientes/', 'ClientesController@index');
Route::get('/api/v1/clientes/{id}', 'ClientesController@show');
Route::post('/api/v1/clientes', 'ClientesController@store');
Route::post('/api/v1/clientes/{id}', 'ClientesController@update');
Route::delete('/api/v1/clientes/{id}', 'ClientesController@destroy');