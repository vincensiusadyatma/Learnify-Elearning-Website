<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Core\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('main.main');
})->name('main');

Route::prefix('auth')->middleware('guest')->group(function(){
    Route::get('/register',[AuthController::class,'showRegister'])->name('show-register');
    Route::post('/register/handle',[AuthController::class,'handleRegister'])->name('handle-register');
    Route::post('/login/handle',[AuthController::class,'handleLogin'])->name('handle-login');
});

Route::post('/logout', [AuthController::class, 'handleLogout'])->name('handle-logout');


Route::middleware(['CheckRole:user'])->prefix('dashboard')->group(function(){
    Route::get('/',[DashboardController::class,'showDashboard'])->name('show-dashboard');
});

