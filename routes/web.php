<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

//ASI ELIMINAMOS RUTAS
//Auth::routes(['register' => false]);
Auth::routes([]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/events', [App\Http\Controllers\EventController::class, 'index']);

Route::get('/events-create', [App\Http\Controllers\EventController::class, 'eventCreate'])->name('eventCreate');
Route::post('/events-store', [App\Http\Controllers\EventController::class, 'eventStore'])->name('eventStore');
Route::get('/events/{id}', [App\Http\Controllers\EventController::class, 'eventShow'])->name('eventShow');

Route::get('/calendar', function () { return view('calendar');})->name('calendar');

Route::get('/users',[App\Http\Controllers\UserController::class, 'index'])->name('userIndex');

Route::get('/misEventos',[EventController::class, 'misEventos'])->name('misEventos');

// Ruta para mostrar el formulario de la evidencia
Route::get('/eventoEvidencia/{id}',[EventController::class, 'eventoEvidencia'])->name('eventoEvidencia');

// Ruta para guardar la evidencia
Route::post('/eventoEvidenciaStore',[EventController::class, 'eventoEvidenciaStore'])->name('eventoEvidenciaStore');

// Ruta para mostrar evidencias
Route::get('evidencias/{filename}', [EventController::class, 'mostrarEvidencia'])->name('evidencia.mostrar');