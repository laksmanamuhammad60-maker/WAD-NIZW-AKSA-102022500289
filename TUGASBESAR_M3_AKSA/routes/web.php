<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DosenController;

Route::get('/', [PengajuanController::class, 'index']);
Route::get('/pengajuan/dosen', [PengajuanController::class, 'dosen']);

Route::get('/pengajuan/tambah-dosen', [DosenController::class, 'create']);
Route::post('/pengajuan/simpan-dosen', [DosenController::class, 'store']);

Route::get('/pengajuan/dosen/{id}/edit', [DosenController::class, 'edit']);
Route::put('/pengajuan/dosen/{id}', [DosenController::class, 'update']);
Route::delete('/pengajuan/dosen/{id}', [DosenController::class, 'destroy']);

Route::resource('pengajuan', PengajuanController::class);
