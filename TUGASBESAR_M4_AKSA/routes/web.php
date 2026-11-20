<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin,staff'])->group(function () {
        Route::get('/', [PengajuanController::class, 'index']);
        Route::get('/pengajuan/dosen', [PengajuanController::class, 'dosen']);

        Route::get('/pengajuan/tambah-dosen', [DosenController::class, 'create']);
        Route::post('/pengajuan/simpan-dosen', [DosenController::class, 'store']);

        Route::get('/pengajuan/dosen/{id}/edit', [DosenController::class, 'edit']);
        Route::put('/pengajuan/dosen/{id}', [DosenController::class, 'update']);

        Route::resource('pengajuan', PengajuanController::class)->except(['destroy']);
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::delete('/pengajuan/dosen/{id}', [DosenController::class, 'destroy']);
        Route::delete('/pengajuan/{pengajuan}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');
    });

});
