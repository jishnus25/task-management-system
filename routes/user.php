<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserLoginController;


Route::get('/user', function () {
    if (auth('web')->check()) {
        return redirect('/user/dashboard');
    }
    return app(\App\Http\Controllers\Auth\UserLoginController::class)->showLoginForm(request());
});

Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.'], function () {
    Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserLoginController::class, 'login']);


    Route::group(['middleware' => ['auth:web']], function () {

        Route::redirect('/', '/user/dashboard');

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/tasks', [\App\Http\Controllers\UserTaskController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/{task}/edit', [\App\Http\Controllers\UserTaskController::class, 'edit'])->name('tasks.edit');
        Route::put('/tasks/{task}', [\App\Http\Controllers\UserTaskController::class, 'update'])->name('tasks.update');

        // User Logout
        Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');
    });
});
