<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::get('/logout', [LoginController::class, 'logout']);

// Bisa di akses jika login
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard-admin', function () {
        return view('admin.dashboard');
    });

    Route::get('/students', [StudentsController::class, 'index']);

});

// Tidak perlu login pun bisa di akses :)
Route::get('/test', function () {
    return view('admin.Table');
});
