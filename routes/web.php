<?php

use App\Http\Controllers\ComunicadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\TemaController;

Route::get('/', [ComunicadoController::class,'index'])->name('comunicados.index'); 

/* Route::get('/', function () {
    return  view('welcome');
}); */
Route::get('comunicados', [ComunicadoController::class,'index'])->name('comunicados.index'); 
Route::get('comunicados/{comunicado}',[ComunicadoController::class,'show'])->name('comunicados.show');
Route::get('comunicados/categoria/{categoria}',[ComunicadoController::class,'categoria'])->name('comunicados.categoria');
Route::get('comunicados/estado/{estado}',[ComunicadoController::class, 'estado'])->name('comunicados.estado');
Route::put('comunicados/publicar/{comunicado}', [ComunicadoController::class,'publicar'])->name('comunicados.publicar'); 


Route::get('actividades', [ActividadController::class,'index'])->name('actividades.index');
Route::get('actividades/{actividad}',[ActividadController::class,'show'])->name('actividades.show');
Route::get('actividades/categoria/{categoria}',[ActividadController::class,'categoria'])->name('actividades.categoria');
Route::get('actividades/estado/{estado}',[ActividadController::class, 'estado'])->name('actividades.estado');
Route::get('actividades/curso/{curso}',[ActividadController::class, 'curso'])->name('actividades.curso');

Route::get('notas', [NotaController::class,'index'])->name('notas.index'); 
Route::get('notas/alumno/{alumno}', [NotaController::class,'detalle'])->name('notas.detalle'); 
Route::get('notas/consulta/{matricula}', [NotaController::class,'consulta'])->name('notas.consulta'); 

Route::get('notas/{alumno}',[NotaController::class,'listado'])->name('notas.listado');
Route::get('notas/{alumno}/{periodo}',[NotaController::class,'listadoperiodo'])->name('notas.listadoperiodo');

Route::get('consultas', [ConsultaController::class,'index'])->name('consultas.index'); 

Route::get('reuniones',[ReunionController::class,'index'])->name('reuniones.index');
Route::get('reuniones/{reunion}',[ReunionController::class,'show'])->name('reuniones.show');
Route::get('reuniones/usuario/{user}',[ReunionController::class,'usuario'])->name('reuniones.usuario');

Route::get('temas', [TemaController::class,'index'])->name('temas.index');
Route::get('temas/{tema}', [TemaController::class,'show'])->name('temas.show');
Route::get('temas/usuario/{user}', [TemaController::class,'usuario'])->name('temas.usuario');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

