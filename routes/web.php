<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// routes/web.php
// Public routes accessible to all
Route::get("/", [RegisterController::class, "index"])->name("register.form");
Route::post("/", [RegisterController::class, "register"])->name("register.post");

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Common authenticated routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin-dashboard', [UserController::class, 'dashboardAdmin'])->name('admin.dashboard');
    });

    Route::middleware(['role:teacher'])->group(function () {
        Route::get('/teacher-dashboard', [UserController::class, 'dashboardTeacher'])->name('teacher.dashboard');    
    });

    // Student routes
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::delete('/student/{id}/delete', [StudentController::class, 'destroy'])->name('students.destroy');
});
