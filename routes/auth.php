<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'submit'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
