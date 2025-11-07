<?php

use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;

// Halaman utama langsung ke login
Route::get('/', function () {
    return view('user.login');
})->name('login.home');

// Halaman login
Route::get('/login', function () {
    return view('user.login');
})->name('login.page');

// Proses login
Route::post('/login/process', [SystemController::class, 'login'])->name('login.process');

// Dashboard admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Dashboard user (panggil dari controller)
Route::get('/user/dashboard', [SystemController::class, 'userDashboard'])->name('user.dashboard');
