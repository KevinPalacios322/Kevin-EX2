<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [EquipoController::class, 'index'])->name('dashboard');
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');

    Route::get('/equipos/crear', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');

    Route::get('/equipos/{equipo}/editar', [EquipoController::class, 'edit'])->name('equipos.edit');
    Route::put('/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
