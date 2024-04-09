<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\Contratop1Controller;
use App\Http\Controllers\Contratop2Controller;
use App\Http\Controllers\Contratop3Controller;
use App\Http\Controllers\CostoController;
use App\Http\Controllers\DependenciaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\IpcController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\SedesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return ["api" => "running..."];
});

//Asignaturas
Route::get('/asignaturas', [AsignaturaController::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/asignaturas/save', [AsignaturaController::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/asignaturas/update', [AsignaturaController::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/asignaturas/delete', [AsignaturaController::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//Docentes
Route::get('/docentes', [DocenteController::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/docentes/save', [DocenteController::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/docentes/update', [DocenteController::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/docentes/delete', [DocenteController::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//Dependencias
Route::get('/dependencias', [DependenciaController::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/dependencias/save', [DependenciaController::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/dependencias/update', [DependenciaController::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/dependencias/delete', [DependenciaController::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//Sedes
Route::get('/sedes', [SedesController::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/sedes/save', [SedesController::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/sedes/update', [SedesController::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/sedes/delete', [SedesController::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/SaveS', [SedesController::class, 'index'])->middleware([App\Http\Middleware\Cors::class]);

//costos
Route::get('/costos', [CostoController::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/costos/save', [CostoController::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/costos/update', [CostoController::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/costos/delete', [CostoController::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//usuarios
Route::get('/usuarios', [UsuariosController::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/usuarios/save', [UsuariosController::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/usuarios/update', [UsuariosController::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/usuarios/delete', [UsuariosController::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//ContratoP1
Route::get('/contratop1', [Contratop1Controller::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop1/save', [Contratop1Controller::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop1/update', [Contratop1Controller::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop1/delete', [Contratop1Controller::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//ContratoP2
Route::get('/contratop2', [Contratop2Controller::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop2/save', [Contratop2Controller::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop2/update', [Contratop2Controller::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop2/delete', [Contratop2Controller::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//ContratoP3
Route::get('/contratop3', [Contratop3Controller::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop3/save', [Contratop3Controller::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop3/update', [Contratop3Controller::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/contratop3/delete', [Contratop3Controller::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//IPC
Route::get('/ipc', [IpcController::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/ipc/save', [IpcController::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/ipc/update', [IpcController::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/ipc/delete', [IpcController::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

//Reportes
Route::get('/reportes', [ReportesController::class, 'show'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/reportes/save', [ReportesController::class, 'save'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/reportes/update', [ReportesController::class, 'update'])->middleware([App\Http\Middleware\Cors::class]);
Route::post('/reportes/delete', [ReportesController::class, 'delete'])->middleware([App\Http\Middleware\Cors::class]);

