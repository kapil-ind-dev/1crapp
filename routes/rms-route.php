<?php

use App\Http\Controllers\rms\DashboardController;
use App\Http\Controllers\rms\TenantController;
use App\Http\Controllers\rms\AuthController as RmsAuthController;
Route::get('rms/', [RmsAuthController::class, 'index'])->name('rms');
Route::get('rms/login', [RmsAuthController::class, 'index'])->name('rms.login');
Route::post('rms/loggedin', [RmsAuthController::class, 'login'])->name('rms.loggedin');
// Route::get('rms/onboard/{token}', [TenantController::class, 'completeTenancyByToken'])->name('rms.public.complete-tenancy');
// Route::post('rms/onboard/{token}/update', [TenantController::class, 'updateTenancyByToken'])->name('rms.public.update-tenancy');
Route::prefix('rms/onboard')->name('rms.public.')->group(function () {
    Route::get('/{token}', [TenantController::class, 'publicOnboardView'])->name('onboard-view');
    Route::post('/{token}/verify', [TenantController::class, 'publicVerifyAgent'])->name('onboard-verify');
    Route::post('/{token}/submit', [TenantController::class, 'publicSaveTenancy'])->name('onboard-save');
});
Route::middleware('tenant')->prefix('rms')->name('rms.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::get('/pin', [DashboardController::class, 'change_pin'])->name('pin');
    Route::put('/pin/update', [DashboardController::class, 'updatePin'])->name('pin.update');
    Route::get('/my-property', [DashboardController::class, 'my_property'])->name('my-property');
    Route::get('/my-payments', [DashboardController::class, 'my_payments'])->name('my-payments');
    Route::get('/get-payment/{id}', [DashboardController::class, 'editPayment'])->name('get-payment');
    Route::post('/update-payment/{id}', [DashboardController::class, 'updatePayment'])->name('update-payment');
    Route::post('/save-rent', [DashboardController::class, 'save_rent'])->name('save-rent');
    Route::get('/my-payments/{id}/history', [DashboardController::class, 'payment_history'])->name('payment-history');
    Route::get('/logout', [RmsAuthController::class, 'logout'])->name('logout');
   // Tenancy Documentation & Details Update (by Tenant)
    Route::get('/tenancy/{id}/edit', [TenantController::class, 'editTenancy'])->name('tenancy.edit');
    Route::post('/tenancy/{id}/update', [TenantController::class, 'updateTenancy'])->name('tenancy.update');
    
});
