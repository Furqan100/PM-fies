<?php

use App\Http\Controllers\AuthController;
use App\Models\Project;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Home Route
Route::get('/', [ProjectController::class,'countUsers_Projects']);
Route::get('/projects',[ProjectController::class,'getAllProject'])->name('projects.getAllProject');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');
// Login and Register Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected Routes (Only for logged-in users)
Route::middleware('auth')->group(function () {
    Route::get('/projects', [ProjectController::class, 'getAllProject'])->name('projects.getAllProject');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Task Route
Route::post('/tasks',[TaskController::class,'store'])->name('tasks.store');
Route::get('/tasks',[TaskController::class,'store'])->name('tasks.store');
Route::get('/tasks',[TaskController::class,'allTasks'])->name('tasks.allTasks');
Route::post('/tasks/{task}/assign', [TaskController::class, 'assignTask'])->name('tasks.assign');
// Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
Route::middleware('auth')->group(function () {
    Route::patch('/tasks/{task}/updateStatus', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
});

// Route::get('/projects/{id}', [TaskController::class, 'showTask'])->name('projects.showTask');


