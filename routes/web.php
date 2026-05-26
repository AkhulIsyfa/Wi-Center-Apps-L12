<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/classes', [CourseClassController::class, 'index'])->name('classes.index');
    Route::get('/classes/{id}', [CourseClassController::class, 'show'])->name('classes.show');
    
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Authentication Routes (Custom Flow)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
