<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\RiwayatController;




Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('pendapatan', PendapatanController::class);
Route::resource('biaya', BiayaController::class);
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');