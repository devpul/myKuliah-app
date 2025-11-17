<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Todolist\TodolistController;
use Illuminate\Container\Attributes\Auth;

Route::get('/', function () {
    return view('auth.register');
});

// ============================= AUTH ================================
Route::post('/register', [AuthController::class, 'register'])
        ->name('register');

Route::get('/login', [AuthController::class, 'indexLogin'])
        ->name('login');
Route::post('/login', [AuthController::class, 'login'])
        ->name('store_login');

        
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('store_logout');
    
    // to do list
    Route::get('/todolist', [TodolistController::class, 'index'])->name('todolist');
    Route::post('/todolist', [TodolistController::class, 'store'])->name('store_todolist');
                                        
});