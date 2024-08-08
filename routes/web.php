<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman awal (Agenda Hari Ini)
Route::get('/', [AgendaController::class, 'index'])->name('agenda.index');

// Rute untuk agenda besok
Route::get('/agenda-besok', [AgendaController::class, 'indexBesok'])->name('agenda.besok');

// Rute untuk halaman login admin
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Rute untuk dashboard admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Rute untuk menambahkan, mengedit, menghapus agenda
Route::get('/admin/agenda/create', [AdminDashboardController::class, 'create'])->name('admin.agenda.create');
Route::post('/admin/agenda', [AdminDashboardController::class, 'store'])->name('admin.agenda.store');
Route::get('/admin/agenda/{id}/edit', [AdminDashboardController::class, 'edit'])->name('admin.agenda.edit');
Route::put('/admin/agenda/{id}', [AdminDashboardController::class, 'update'])->name('admin.agenda.update');
Route::delete('/admin/agenda/{id}', [AdminDashboardController::class, 'destroy'])->name('admin.agenda.destroy');
