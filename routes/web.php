<?php

use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('Pages.dashboard');
// });

// Route::middleware(['guest'])->group(function(){
//     Route::get('/',[SesiController::class,'index'])->name('login');
//     Route::post('/',[SesiController::class,'login']);
// });

// Route::middleware(['auth'])->group(function(){
//     Route::get('/admin',[AdminController::class,'index']);
//     Route::get('/logout',[SesiController::class,'logout']);
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('/auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-proses', [AuthController::class, 'register_proses'])->name('register-proses');

});
// adminn
// routes/web.php

Route::group(['prefix' => 'admin','middleware' => ['auth'], 'as' => 'admin.'] , function(){
    Route::get('/Data-absensi', [AdminController::class, 'status'])->name('status');
    Route::get('/home', [AdminController::class, 'home'])->name('home');
    Route::get('/Data-kegiatan', [AdminController::class, 'kegiatan'])->name('kegiatan');
    Route::get('/manajemen-user', [AuthController::class, 'manajemen'])->name('manajemen');

    Route::delete('/delete/{id}' , [AuthController::class , 'deleteData'])->name('deleteData');
});


// akhir admin

// users
Route::group(['prefix' => 'user','middleware' => ['auth'], 'as' => 'user.'] , function(){
    Route::get('/status-user', [UsersController::class, 'master'])->name('statusUser');
    Route::get('/kegiatan-user', [UsersController::class, 'KegiatanUser'])->name('kegiatanUser');

});
Route::get('/users',function(){
    return view('users.statusUser');
});
Route::get('/kegiatan-User',function(){
    return view('users.kegiatanUser');
});

// akhir Users

// Admin
// Route::get('/',function(){
//     return redirect('/admin');
// });
// Route::get('/admin',function(){
//     return view('admin.home');
// });
// Akhir Admin


