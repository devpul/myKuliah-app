<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Todolist\TodolistController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Lecture\LectureController;

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
    
    // subjects
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects');
    Route::get('/create-subject', [SubjectController::class, 'create'])->name('create_subject');
    Route::post('/store-subjects', [SubjectController::class, 'store'])->name('store_subject');
     
    // events
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::get('/events-data', [EventController::class, 'events'])->name('events_data');
    
    // lectures
    Route::get('/lectures', [LectureController::class, 'index'])->name('lectures');
    Route::get('/create_lectures', [LectureController::class, 'create'])->name('create_lecture');

   
});