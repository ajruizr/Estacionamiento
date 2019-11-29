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

Auth::routes(['verify'=>true]);


//
Route::resource('estacionamiento','EstacionamientoController'); //con este nos evitamos todo el mapeo
Route::resource('lugar','LugarController');
Route::resource('horario','HorarioController');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('estacionamiento/{estacionamiento}/info', 'EstacionamientoController@infomail')->name('estacionamiento.infomail');
    //Archivos->
    Route::post('archivo/cargar', 'ArchivoController@upload')->name('archivo.upload');
    Route::get('archivo/{archivo}/descargar', 'ArchivoController@download')->name('archivo.download');
    Route::post('archivo/{archivo}/borrar', 'ArchivoController@delete')->name('archivo.delete');
    Route::get('/home', 'HomeController@index')->name('home');
});


Auth::routes();


