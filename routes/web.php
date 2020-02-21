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
Route::resource('empleados', 'EmpleadosController');
Route::get('/getDls/{salario}', 'EmpleadosController@getDls')->name('empleados.getDls');
Route::get('/empleados/delete/{id}', 'EmpleadosController@destroy')->name('empleados.delete');
Route::get('/empleados/desactivar/{id}', 'EmpleadosController@desactivar')->name('empleados.desactivar');
Route::get('/empleados/activar/{id}', 'EmpleadosController@activar')->name('empleados.activar');
Route::post('/empleados/update/{id}', 'EmpleadosController@update')->name('empleados.update');

Route::get('/empleados/getAumento/{id}', 'EmpleadosController@getAumento')->name('empleados.aumento');
