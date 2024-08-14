<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

// route sesi
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/');
});

// route schedule
Route::middleware(['auth'])->group(function () {
    Route::get('/', [ScheduleController::class, "index"])->name('schedule')->middleware('userAkses:admin')->middleware('userAkses:admin');
    Route::get('/tambahschedule', [ScheduleController::class, "tambah"])->middleware('userAkses:admin');
    Route::post('/tambahschedule', [ScheduleController::class, "store"])->name('tambah_schedule')->middleware('userAkses:admin');
    Route::get('/schedules/edit/{id}', [ScheduleController::class, "edit"])->middleware('userAkses:admin');
    Route::put('/schedules/update/{id}', [ScheduleController::class, "update"])->name('update_schedule')->middleware('userAkses:admin');
    Route::get('/schedules', [ScheduleController::class, "sortByDate"])->name('schedules.sortByDate')->middleware('userAkses:admin');
    Route::get('/hapusschedule/{id}', [ScheduleController::class, "delete"])->middleware('userAkses:admin');

    // route non admin
    Route::get('/employee', [SesiController::class, 'nonAdmin'])->middleware('userAkses:non_admin');
    Route::get('/employee/sort', [SesiController::class, 'sortByDate'])->middleware('userAkses:non_admin')->name('employee.sortByDate');

    // route my schedules
    Route::get('/myschedules', [SesiController::class, 'employees'])->middleware('userAkses:non_admin');

    // route menu
    Route::get('/menu', [SesiController::class, 'menu']);

    // route logout
    Route::get('/logout', [SesiController::class, 'logout']);
});

// route karyawan
Route::get('/karyawan', [KaryawanController::class, "karyawan"])->name('karyawan');
Route::get('/karyawan/tambah', [KaryawanController::class, "tambah"]);
Route::post('/karyawan/tambah', [KaryawanController::class, "store"])->name('tambah_karyawan');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, "edit"]);
Route::put('/karyawan/update/{id}', [KaryawanController::class, "update"])->name('update_karyawan');
Route::get('/karyawan/delete/{id}', [KaryawanController::class, "delete"]);
