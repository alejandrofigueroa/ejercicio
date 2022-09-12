<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignacioneController;
use App\Http\Controllers\CooperanteController;
use App\Http\Controllers\ProyectoController;
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
    return view('inicio');
});


Route::resource('cooperantes', CooperanteController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('asignaciones', AsignacioneController::class);
Route::get('/generar-pdf/{id}', [AsignacioneController::class, 'generarReporte'])->name("reporte.pdf");