<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1')->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('welcome'))->name('dashboard');
    Route::get('/welcome', fn () => redirect()->route('dashboard'))->name('welcome');
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
});
