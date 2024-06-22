<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PesertaController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'UserMiddleware'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/peserta', [PesertaController::class, 'index'])->name('admin.peserta');

    Route::get('/admin/konser', [KonserController::class, 'adminIndex'])->name('admin.konser.index');
    Route::get('/admin/konser/create', [KonserController::class, 'create'])->name('admin.konser.create');
    Route::get('/admin/konser/edit', [KonserController::class, 'edit'])->name('admin.konser.edit');
    Route::get('/admin/konser/delete', [KonserController::class, 'delete'])->name('admin.konser.destroy');
    
    Route::get('/admin/tiket', [TiketController::class, 'adminIndex'])->name('admin.tiket');
});


require __DIR__.'/auth.php';
