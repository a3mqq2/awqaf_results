<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicResultController;
use App\Http\Controllers\StudentResultController;

// Public Routes - الواجهة العامة
Route::get('/', [PublicResultController::class, 'index'])->name('home');
Route::post('/search', [PublicResultController::class, 'search'])->name('public.search');
Route::get('/print/{id}', [PublicResultController::class, 'print'])->name('public.print');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Admin Routes - لوحة التحكم
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Custom routes must come before resource routes to avoid conflicts
    Route::post('/results/import', [StudentResultController::class, 'import'])->name('results.import');
    Route::get('/results/export', [StudentResultController::class, 'export'])->name('results.export');
    Route::get('/results/template', [StudentResultController::class, 'downloadTemplate'])->name('results.template');

    Route::resource('results', StudentResultController::class);
});

require __DIR__.'/auth.php';
