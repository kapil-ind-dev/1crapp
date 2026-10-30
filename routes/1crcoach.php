<?php

use App\Http\Controllers\coach\taxmate\AuthController;
use App\Http\Controllers\coach\taxmate\IndexController;

use App\Http\Controllers\coach\superemployee\SuperEmployeeDashboardController;
use App\Http\Controllers\coach\superretirement\SuperRetirementDashboardController;
use App\Http\Controllers\coach\superrealtor\SuperRealtorDashboardController;
use App\Http\Controllers\coach\superpartner\SuperPartnerDashboardController;

use App\Http\Controllers\coach\courses\sebp\SebpController;
Route::prefix('1crcoach/taxmate')->name('1crcoach.taxmate.')->group(function(){
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
    
    
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard2', [IndexController::class, 'dashboard'])->name('dashboard2');
    
    Route::get('/income-from-salary', [IndexController::class, 'income_from_salary'])->name('income-from-salary');
    Route::get('/income-from-house-property', [IndexController::class, 'income_from_house_property'])->name('income-from-house-property');
    Route::get('/income-from-capital-gains', [IndexController::class, 'income_from_capital_gains'])->name('income-from-capital-gains');
    Route::get('/income-from-business', [IndexController::class, 'income_from_business'])->name('income-from-business');
    Route::get('/income-from-other-sources', [IndexController::class, 'income_from_other_sources'])->name('income-from-other-sources');
    Route::get('/deductions-tax-planning', [IndexController::class, 'deductions_tax_planning'])->name('deductions-tax-planning');
    Route::get('/tds-tcs-advance-taxes', [IndexController::class, 'tds_tcs_advance_taxes'])->name('tds-tcs-advance-taxes');
    Route::get('/review-documents-itr-mapping', [IndexController::class, 'review_documents_itr_mapping'])->name('review-documents-itr-mapping');
    Route::get('/tax-summary-computation', [IndexController::class, 'tax_summary_computation'])->name('tax-summary-computation');
    
});

Route::prefix('1crcoach/courses/1crsebp')->name('1crcoach.courses.1crsebp.')->group(function(){
    Route::get('/dashboard', [SebpController::class, 'dashboard'])->name('dashboard');
});


Route::prefix('1crcoach/1cr-super-employee')->name('1crcoach.1cr-super-employee.')->group(function(){
    Route::get('/dashboard', [SuperEmployeeDashboardController::class, 'dashboard'])->name('dashboard');
});
Route::prefix('1crcoach/1cr-super-retirement')->name('1crcoach.1cr-super-retirement.')->group(function(){
    Route::get('/dashboard', [SuperRetirementDashboardController::class, 'dashboard'])->name('dashboard');
});
Route::prefix('1crcoach/1cr-super-realtor')->name('1crcoach.1cr-super-realtor.')->group(function(){
    Route::get('/dashboard', [SuperRealtorDashboardController::class, 'dashboard'])->name('dashboard');
});
Route::prefix('1crcoach/1cr-super-partner')->name('1crcoach.1cr-super-partner.')->group(function(){
    Route::get('/dashboard', [SuperPartnerDashboardController::class, 'dashboard'])->name('dashboard');
});