<?php
use App\Http\Controllers\AdminController;

use App\Http\Controllers\kegiatanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->controller(kegiatanController::class)->group(function (){
    Route::get('/get', 'getAllData');
    Route::post('/create', 'createData');
    Route::get('/edit/{id}', 'editDataById');
    Route::post('/update/{id}', 'updateData');
    Route::delete('delete/{id}', 'deleteData');
});

Route::prefix('v1')->controller(AdminController::class)->group(function () {
    Route::get('/get', 'getAllData');
    Route::post('/create',  'createData');
    Route::get('/edit/{id}', 'editDataById');
    Route::post('/update/{id}', 'updateData');
    Route::delete('/delete/{id}', 'deleteData');
});
