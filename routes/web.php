<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

// route schedule
Route::get('/', [ScheduleController::class, "index"])->name('schedule');
Route::get('/tambahschedule', [ScheduleController::class, "tambah"]);
Route::post('/tambahschedule', [ScheduleController::class, "store"])->name('tambah_schedule');
Route::get('/schedules', [ScheduleController::class, "sortByDate"])->name('schedules.sortByDate');
Route::get('/hapusschedule/{id}', [ScheduleController::class, "delete"]);

// route karyawan
Route::get('/karyawan', [KaryawanController::class, "karyawan"])->name('karyawan');
Route::get('/karyawan/tambah', [KaryawanController::class, "tambah"]);
Route::post('/karyawan/tambah', [KaryawanController::class, "store"])->name('tambah_karyawan');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, "edit"]);
Route::put('/karyawan/update/{id}', [KaryawanController::class, "update"])->name('update_karyawan');
Route::get('/karyawan/delete/{id}', [KaryawanController::class, "delete"]);
