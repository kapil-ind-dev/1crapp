<?php

use App\Http\Controllers\ngo\AuthController;
Route::prefix('ngo')->name('ngo.')->group(function(){
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
    
    
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard1', [AuthController::class, 'dashboard1'])->name('dashboard1');
    Route::get('/membership-registration', [AuthController::class, 'membership_registration'])->name('membership-registration');
    
    
    
    
    
});