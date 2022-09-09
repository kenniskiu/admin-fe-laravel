<?php

use App\Http\Controllers\LecturersController;
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

    // students
    Route::get('/students', [StudentsController::class, 'index']);
    Route::get('/students-create', [StudentsController::class, 'create']);
    Route::post('/students-store', [StudentsController::class, 'store']);
    Route::get('/students-edit/{id}', [StudentsController::class, 'edit']);
    Route::post('/students-update/{id}', [StudentsController::class, 'update']);
    Route::get('/students-destroy/{id}', [StudentsController::class, 'destroy']);

    // lecturers
    Route::get('/lecturers', [LecturersController::class, 'index']);
    Route::get('/lecturers-create', [LecturersController::class, 'create']);
    Route::post('/lecturers-store', [LecturersController::class, 'store']);
    Route::get('/lecturers-edit/{id}', [LecturersController::class, 'edit']);
    Route::post('/lecturers-update/{id}', [LecturersController::class, 'update']);
    Route::get('/lecturers-destroy/{id}', [LecturersController::class, 'destroy']);
});

// Tidak perlu login pun bisa di akses :)
Route::get('/test', function () {
    return view('admin.Table');
});
