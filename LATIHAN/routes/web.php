<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CekLogin;
use Illuminate\Support\Facades\Route;

// Default redirect to login
Route::get('/', [AuthController::class, 'login']);

// Authentication Routes
Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post("/login", [AuthController::class, 'do_login']);
Route::get("/register", [AuthController::class, 'register']);
Route::post("/register", [AuthController::class, 'do_register']);
Route::get("/logout", [AuthController::class, 'logout']);

// Route Group with Authentication
Route::middleware(['auth'])->group(function () {

    // Admin Role
    Route::middleware([CekLogin::class . ':admin'])->group(function () {
        Route::get("/admin", [AdminController::class, 'index']);
        Route::resource('prodi', ProdiController::class);
        Route::resource('fakultas', FakultasController::class);
    });

    // User Role
    Route::middleware([CekLogin::class . ':user'])->group(function () {
        Route::get("/user", [UserController::class, 'index']);
    });
});    
