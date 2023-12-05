<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Halaman admin

Route::prefix('/')->group(function () {
    Route::get('/admin', function () {
        return view('admin.home');
    })->name('home');

    Route::get('/Data-absensi', function () {
        return view('admin.status');
    })->name('status');


    Route::get('/Data-kegiatan', function () {
        return view('admin.kegiatan');
    })->name('kegiatan');

    Route::get('/manajemen-user', function () {
        return view('admin.manajemen');
    })->name('manajemen');
});
// akhir Halaman admin

// Halaman users

Route::prefix('/users')->group(function () {

    Route::get('/status-user', function () {
        return view('users.statusUser');
    })->name('statusUser');

    Route::get('/kegiatan-user', function () {
        return view('users.kegiatanUser');
    })->name('kegiatanUser');
});

Route::get('/users', function () {
    return view('users.statusUser');
});
// akhir Halaman Users
