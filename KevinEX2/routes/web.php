<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Equipo;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('equipos.index', [
            'equipos' => Equipo::query()->orderBy('id')->limit(10)->get(),
        ]);
    })->name('dashboard');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
