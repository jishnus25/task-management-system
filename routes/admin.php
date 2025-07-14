<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::get('/login', [AdminLoginController::class, 'showLoginForm']);
    Route::post('/login', [AdminLoginController::class, 'login']);

    // Protected admin routes
    Route::group(['middleware' => ['auth:admin']], function () {
        // Dashboard Route
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        // Users Management
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

        // Admins Management
        Route::get('/admins', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admins.index');

        // Tasks Management
        Route::get('/tasks', [App\Http\Controllers\Admin\TaskController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/create', [App\Http\Controllers\Admin\TaskController::class, 'create'])->name('tasks.create');
        Route::post('/tasks', [App\Http\Controllers\Admin\TaskController::class, 'store'])->name('tasks.store');
        Route::get('/tasks/{task}/edit', [App\Http\Controllers\Admin\TaskController::class, 'edit'])->name('tasks.edit');
        Route::put('/tasks/{task}', [App\Http\Controllers\Admin\TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/tasks/{task}', [App\Http\Controllers\Admin\TaskController::class, 'destroy'])->name('tasks.destroy');

        // Logout
        Route::post('/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');
    });
});
