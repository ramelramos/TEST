<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');



Route::middleware(['api'])->group(function () {
    Route::get('/tareas', [TareaController::class, 'index']);
    Route::post('/tareas', [TareaController::class, 'store']);
    Route::get('/tareas/{tarea}', [TareaController::class, 'show']);
    Route::put('/tareas/{tarea}', [TareaController::class, 'update']);
    Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy']);
});
