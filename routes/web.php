<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [KaryawanController::class, "index"]);

// route karyawan
Route::get('/karyawan', [KaryawanController::class, "karyawan"])->name('karyawan');
Route::get('/karyawan/tambah', [KaryawanController::class, "tambah"]);
Route::get('/karyawan/delete/{id}', [KaryawanController::class, "delete"]);
