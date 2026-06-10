<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas del profesional
Route::middleware('auth')->group(function () {
    Route::get('/profesional/perfil', [App\Http\Controllers\ProfesionalController::class, 'show'])->name('profesional.perfil');
    Route::get('/profesional/editar', [App\Http\Controllers\ProfesionalController::class, 'edit'])->name('profesional.editar');
    Route::put('/profesional/actualizar', [App\Http\Controllers\ProfesionalController::class, 'update'])->name('profesional.update');
});

// Rutas del paciente
Route::middleware('auth')->group(function () {
    Route::get('/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('paciente.index');
    Route::get('/pacientes/crear', [App\Http\Controllers\PacienteController::class, 'create'])->name('paciente.crear');
    Route::post('/pacientes', [App\Http\Controllers\PacienteController::class, 'store'])->name('paciente.store');
    Route::get('/pacientes/{id}/editar', [App\Http\Controllers\PacienteController::class, 'edit'])->name('paciente.editar');
    Route::put('/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('paciente.update');
    Route::delete('/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('paciente.destroy');
});

// Rutas del chat IA
Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/enviar', [App\Http\Controllers\ChatController::class, 'enviar'])->name('chat.enviar');