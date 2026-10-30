<?php

use App\Http\Controllers\myvillage\AuthController;
Route::prefix('my-village')->name('my-village.')->group(function(){
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
    
    
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    
    
    
    
});