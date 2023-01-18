<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;

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
//CALENDAR
Route::controller(HorarioController::class)->group(function () {
    Route::get('calendar', 'index');
    Route::post('horas', 'ajax');
    Route::get('/reserva2{id}', 'otraVista');

});

//RESERVA INVITADO
Route::get('/invireser', [ReservaController::class, 'hacerReserva']);
//RESERVA REALIZADA
Route::get('/reservarealizada', function () {
    return view('reservarealizada');
});

//ver index
Route::get('/', function () {
    return view('index');
});

//ver menu

Route::get('/menu', function () {
    return view('menu');
});

//ver contacto

Route::get('/contacto', function () {
    return view('contacto');
});

//ver reservar

Route::get('/reservar', function () {
    return view('reservar');
});



