<?php

use Illuminate\Http\Request;
use App\Estacionamiento;
use App\Lugar;
use App\Horario;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/estacionamiento/{estacionamiento}',function (Estacionamiento $estacionamiento){
    return $estacionamiento;
});

Route::get('/lugar/{lugar}',function (Lugar $lugar){
    return $lugar;
});

Route::get('/horario/{horario}',function (Horario $horario){
    return $horario;
});
