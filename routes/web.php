<?php

use App\Http\Controllers\AuthController;
use App\Models\Project;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/projects',[ProjectController::class,'getAllProject'])->name('projects.getAllProject');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

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

