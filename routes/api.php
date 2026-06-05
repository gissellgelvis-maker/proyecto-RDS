<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\FuncionesCargoController;
use App\Http\Controllers\EmpleadoController;

Route::apiResource('cargos', CargoController::class);
Route::apiResource('funciones-cargo', FuncionesCargoController::class);
Route::apiResource('empleados', EmpleadoController::class);