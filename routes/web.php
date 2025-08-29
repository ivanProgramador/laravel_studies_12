<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::view('/login','auth.login')->name('login');
    Route::get('/login/{id}', [AuthController::class, 'login_user'])->name('login_user');

});

Route::middleware('auth')->group(function () {

   Route::redirect('/','/home');

});
