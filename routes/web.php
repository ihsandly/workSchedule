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

    // route akun
    Route::get('/akun', [KaryawanController::class, 'akun'])->name('akun')->middleware('userAkses:admin');
    Route::get('/akun/tambah', [KaryawanController::class, 'tambahAkun'])->middleware('userAkses:admin');
    Route::post('/akun/tambah', [KaryawanController::class, 'storeAkun'])->middleware('userAkses:admin')->name('tambah_akun');
    Route::get('/akun/edit/{id}', [KaryawanController::class, 'editAkun'])->middleware('userAkses:admin');
    Route::put('/akun/update/{id}', [KaryawanController::class, "updateAkun"])->middleware('userAkses:admin')->name('update_akun');
    Route::get('/akun/delete/{id}', [KaryawanController::class, 'hapusAkun'])->middleware('userAkses:admin');

    // route non admin
    Route::get('/employee', [SesiController::class, 'nonAdmin'])->middleware('userAkses:non_admin');
    Route::get('/employee/sort', [SesiController::class, 'sortByDate'])->middleware('userAkses:non_admin')->name('employee.sortByDate');

    // route ubah data akun
    Route::get('/ubahdataakun', [SesiController::class, 'ubahDataAkun'])->middleware('userAkses:non_admin');
    Route::put('/ubahdata', [SesiController::class, 'updateDataAkun'])->middleware('userAkses:non_admin')->name('update_dataakun');

    // route my schedules
    Route::get('/myschedules', [SesiController::class, 'employees'])->middleware('userAkses:non_admin');
    Route::get('/myschedules/sort', [SesiController::class, 'employeesSortByDate'])->middleware('userAkses:non_admin')->name('myschedules.sortByDate');

    // route menu
    Route::get('/menu', [SesiController::class, 'menu']);

    // route logout
    Route::get('/logout', [SesiController::class, 'logout']);
});

// route karyawan
Route::get('/karyawan', [KaryawanController::class, "karyawan"])->name('karyawan')->middleware('userAkses:admin');
Route::get('/karyawan/tambah', [KaryawanController::class, "tambah"])->middleware('userAkses:admin');
Route::post('/karyawan/tambah', [KaryawanController::class, "store"])->name('tambah_karyawan')->middleware('userAkses:admin');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, "edit"])->middleware('userAkses:admin');
Route::put('/karyawan/update/{id}', [KaryawanController::class, "update"])->name('update_karyawan')->middleware('userAkses:admin');
Route::get('/karyawan/delete/{id}', [KaryawanController::class, "delete"])->middleware('userAkses:admin');
