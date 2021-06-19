<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PacienteController;

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

Route::group(['prefix' => 'v1'], function() {
    Route::get('pacientes', [PacienteController::class, 'index']);
    Route::post('paciente', [PacienteController::class, 'store']);
    Route::get('paciente/{paciente}', [PacienteController::class, 'show']);
    Route::put('paciente/{paciente}', [PacienteController::class, 'update']);
    Route::delete('paciente/{paciente}', [PacienteController::class, 'destroy']);

    Route::get('doctores', [DoctorController::class, 'index']);
    Route::post('doctor', [DoctorController::class, 'store']);
    Route::get('doctor/{doctor}', [DoctorController::class, 'show']);
    Route::put('doctor/{doctor}', [DoctorController::class, 'update']);
    Route::delete('doctor/{doctor}', [DoctorController::class, 'destroy']);

    Route::get('citas', [CitaController::class, 'index']);
    Route::post('cita', [CitaController::class, 'store']);
    Route::get('cita/{cita}', [CitaController::class, 'show']);
    Route::put('cita/{cita}', [CitaController::class, 'update']);
    Route::delete('cita/{cita}', [CitaController::class, 'destroy']);
});

