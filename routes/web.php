<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/schedule/{group}', [App\Http\Controllers\GroupController::class, 'editSchedule'])->name('dashboard.schedule');
Route::get('/tables', [App\Http\Controllers\DashboardController::class, 'indexTables'])->name('tables');
Route::get('/billings', [App\Http\Controllers\DashboardController::class, 'indexBillings'])->name('billigns');
Route::get('/sign-in', [App\Http\Controllers\DashboardController::class, 'indexSignin'])->name('signin');
Route::get('/sign-up', [App\Http\Controllers\DashboardController::class, 'indexSignup'])->name('signup');
Route::get('/sign-up', [App\Http\Controllers\DashboardController::class, 'indexSignup'])->name('signup');

Route::post('/subjects', [App\Http\Controllers\SubjectController::class, 'store'])->name('subjects.store');
Route::post('/subjects/{subject}/{group}/{day}/{turn}', [App\Http\Controllers\SubjectController::class, 'destroy'])->name('subjects.destroy');
Route::resource('groups', GroupController::class)->except('show');

Route::prefix('{schoolname}')->group(function () {
    Route::get('/group/{group_code}', [App\Http\Controllers\GroupController::class, 'show'])->name('groups.show');
});
