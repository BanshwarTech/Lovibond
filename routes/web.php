<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminLoginController;
use App\Http\Controllers\dashboardController;

Route::get('/admin', [adminLoginController::class, 'login'])->name('login');
Route::post('/admin/login', [adminLoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [adminLoginController::class, 'adminLogout'])->name('admin.logout');

Route::get('/admin/dashboard', [dashboardController::class, 'index']);
Route::get('/admin/downloadList', [dashboardController::class, "downloadList"])->name('download.list');
Route::get('/admin/export-csv', [dashboardController::class, "exportCsv"])->name('export-csv');
