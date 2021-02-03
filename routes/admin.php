<?php

use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\ComunicadoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NotaController;
use App\Http\Controllers\Admin\PadreController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Admin\PeriodoController;
use App\Http\Controllers\Admin\ProgramacionController;
use App\Http\Controllers\Admin\TemaController;
use App\Http\Controllers\Admin\ReunionController;
use App\Http\Controllers\Admin\AsistenciaController;
use App\Http\Controllers\Admin\AsistenciadController;
use App\Http\Controllers\Admin\AsistenciaeController;
use App\Http\Controllers\Admin\RoleController;

Route::get('', [HomeController::class,'index'])->name('admin.index');

Route::group(['middleware' => ['auth']], function() {
    
    Route::resource('comunicados', ComunicadoController::class)->names('admin.comunicados');
    Route::resource('categorias', CategoriaController::class)->names('admin.categorias');
    Route::resource('cursos', CursoController::class)->names('admin.cursos');
    Route::resource('docentes', DocenteController::class)->names('admin.docentes');
    Route::resource('alumnos', AlumnoController::class)->names('admin.alumnos');
    Route::resource('padres', PadreController::class)->names('admin.padres');
    Route::resource('notas', NotaController::class)->names('admin.notas');
    Route::get('notas/programacion/{programacion}',
        [NotaController::class,'detalle'])->name('admin.notas.detalle');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('actividads', ActividadController::class)->names('admin.actividads');
    Route::resource('periodos', PeriodoController::class)->names('admin.periodos');
    Route::resource('programacions', ProgramacionController::class)->names('admin.programacions');
    Route::resource('temas', TemaController::class)->names('admin.temas');
    Route::resource('reunions', ReunionController::class)->names('admin.reunions');
    Route::resource('asistencias', AsistenciaController::class)->names('admin.asistencias');
    Route::get('asistencias/reunion/{reunion}',
        [AsistenciaController::class,'detalle'])->name('admin.asistencias.detalle');
    Route::resource('asistenciads', AsistenciadController::class)->names('admin.asistenciads');
    Route::get('asistenciads/programacion/{programacion}', 
        [AsistenciadController::class,'detalle'])->name('admin.asistenciads.detalle');
    Route::resource('asistenciaes', AsistenciaeController::class)->names('admin.asistenciaes');
    Route::get('asistenciaes/programacion/{programacion}',
        [AsistenciaeController::class,'detalle'])->name('admin.asistenciaes.detalle');

    Route::resource('roles', RoleController::class)->names('admin.roles');
});

