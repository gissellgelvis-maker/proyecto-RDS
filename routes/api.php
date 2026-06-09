<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\FuncionesCargoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\AuthController;

//ruta login

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){

// Cargos

Route::get('/cargos', [CargoController::class, 'index']);
Route::post('/cargos', [CargoController::class, 'store']);
Route::get('/cargos/{id}', [CargoController::class, 'show']);
Route::put('/cargos/{id}', [CargoController::class, 'update']);
Route::delete('/cargos/{id}', [CargoController::class, 'destroy']);

//Funciones Cargos

Route::get('/funciones-cargo', [FuncionesCargoController::class, 'index']);
Route::post('/funciones-cargo', [FuncionesCargoController::class, 'store']);
Route::get('/funciones-cargo/{id}', [FuncionesCargoController::class, 'show']);
Route::put('/funciones-cargo/{id}', [FuncionesCargoController::class, 'update']);
Route::delete('/funciones-cargo/{id}', [FuncionesCargoController::class, 'destroy']);

// Empleados

Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'show']);
Route::put('/empleados/{id}', [EmpleadoController::class, 'update']);
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']);


// ruta cierre sesion

Route::post('/logout', [AuthController::class, 'logout']);


});