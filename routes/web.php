<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return redirect('/user/login');
    })->name('home');
});

Route::get('/login', function () {
    return redirect('/user/login');
})->name('login');
Route::get('/user/login', [\App\Http\Controllers\Auth\UserLoginController::class, 'showLoginForm']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
