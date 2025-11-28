<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Xtra\ActivityController;
use App\Http\Controllers\Chatbot\ChatbotController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Todolists\TodolistController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Timetable\TimetableController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- GUEST ROUTES ---
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.post')->middleware('guest');

// Google Auth
Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

// --- AUTHENTICATED ROUTES ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/timetable', [TimetableController::class, 'index'])->name('timetable');

    // Using `subjects.index` to match the usage in `create.blade.php`.
    // The sidebar link will need to be updated from `subjects` to `subjects.index`.
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
    Route::get('/subjects/{subject}/detail', [SubjectController::class, 'detail'])->name('subjects.detail');
    Route::get('/subjects/{subject}/pertemuan', [SubjectController::class, 'pertemuan'])->name('subject.pertemuan');


    // Using `tasks.index` to match usage in other files.
    // The sidebar link will need to be updated from `tasks` to `tasks.index`.
    Route::get('/tasks', [TodolistController::class, 'indexTasks'])->name('tasks.index');
    Route::get('/tasks/create', [TodolistController::class, 'createTask'])->name('tasks.create');
    Route::post('/tasks', [TodolistController::class, 'storeTask'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TodolistController::class, 'editTask'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TodolistController::class, 'updateTask'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TodolistController::class, 'destroyTask'])->name('tasks.destroy');

    Route::get('/exams', [TodolistController::class, 'indexExams'])->name('exams.index');
    Route::get('/exams/create', [TodolistController::class, 'createExam'])->name('exams.create');
    Route::post('/exams', [TodolistController::class, 'storeExam'])->name('exams.store');
    Route::get('/exams/{exam}/edit', [TodolistController::class, 'editExam'])->name('exams.edit');
    Route::put('/exams/{exam}', [TodolistController::class, 'updateExam'])->name('exams.update');
    Route::delete('/exams/{exam}', [TodolistController::class, 'destroyExam'])->name('exams.destroy');

    Route::resource('xtra', ActivityController::class)->names('xtra');

    Route::view('/settings', 'settings.index')->name('settings');

    Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
    Route::post('/chatbot-get', [ChatbotController::class, 'chat'])->name('chatbot.get');


});
