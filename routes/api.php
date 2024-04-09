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


//Asignaturas
Route::get('/asignaturas', [AsignaturaController::class, 'show']);
Route::post('/asignaturas/save', [AsignaturaController::class, 'save']);
Route::post('/asignaturas/update', [AsignaturaController::class, 'update']);
Route::post('/asignaturas/delete', [AsignaturaController::class, 'delete']);

//Docentes
Route::get('/docentes', [DocenteController::class, 'show']);
Route::post('/docentes/save', [DocenteController::class, 'save']);
Route::post('/docentes/update', [DocenteController::class, 'update']);
Route::post('/docentes/delete', [DocenteController::class, 'delete']);

//Dependencias
Route::get('/dependencias', [DependenciaController::class, 'show']);
Route::post('/dependencias/save', [DependenciaController::class, 'save']);
Route::post('/dependencias/update', [DependenciaController::class, 'update']);
Route::post('/dependencias/delete', [DependenciaController::class, 'delete']);

//Sedes
Route::get('/sedes', [SedesController::class, 'show']);
Route::post('/sedes/save', [SedesController::class, 'save']);
Route::post('/sedes/update', [SedesController::class, 'update']);
Route::post('/sedes/delete', [SedesController::class, 'delete']);

//costos
Route::get('/costos', [CostoController::class, 'index']);
Route::post('/costos/save', [CostoController::class, 'save']);
Route::post('/costos/update', [CostoController::class, 'update']);
Route::post('/costos/delete', [CostoController::class, 'delete']);

//usuarios
Route::get('/usuarios', [UsuariosController::class, 'index']);
Route::post('/usuarios/save', [UsuariosController::class, 'save']);
Route::post('/usuarios/update', [UsuariosController::class, 'update']);
Route::post('/usuarios/delete', [UsuariosController::class, 'delete']);

//ContratoP1
Route::get('/contratop1', [Contratop1Controller::class, 'index']);
Route::post('/contratop1/save', [Contratop1Controller::class, 'save']);
Route::post('/contratop1/update', [Contratop1Controller::class, 'update']);
Route::post('/contratop1/delete', [Contratop1Controller::class, 'delete']);

//ContratoP2
Route::get('/contratop2', [Contratop2Controller::class, 'index']);
Route::post('/contratop2/save', [Contratop2Controller::class, 'save']);
Route::post('/contratop2/update', [Contratop2Controller::class, 'update']);
Route::post('/contratop2/delete', [Contratop2Controller::class, 'delete']);

//ContratoP3
Route::get('/contratop3', [Contratop3Controller::class, 'index']);
Route::post('/contratop3/save', [Contratop3Controller::class, 'save']);
Route::post('/contratop3/update', [Contratop3Controller::class, 'update']);
Route::post('/contratop3/delete', [Contratop3Controller::class, 'delete']);

//IPC
Route::get('/ipc', [IpcController::class, 'index']);
Route::post('/ipc/save', [IpcController::class, 'save']);
Route::post('/ipc/update', [IpcController::class, 'update']);
Route::post('/ipc/delete', [IpcController::class, 'delete']);

//Reportes
Route::get('/reportes', [ReportesController::class, 'index']);
Route::post('/reportes/save', [ReportesController::class, 'save']);
Route::post('/reportes/update', [ReportesController::class, 'update']);
Route::post('/reportes/delete', [ReportesController::class, 'delete']);
