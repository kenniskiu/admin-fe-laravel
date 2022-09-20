<?php

use App\Http\Controllers\LecturersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\MajorController;
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

    Route::get('/dashboard-admin', [DashboardController::class,'index']);

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

    // administration
    Route::get('/verifyUser', [VerifyController::class, 'index']);
    Route::post('/verifyUser-verify', [VerifyController::class, 'verify']);
    Route::get('/verifyUser-files/{id}', [VerifyController::class, 'files']);
    Route::get('/download/{filename}', [VerifyController::class, 'downloadFile']);

    // major

    Route::get('/majors', [MajorController::class, 'index']);
    Route::get('/majors-create', [MajorController::class, 'create']);
    Route::post('/majors-store', [MajorController::class, 'store']);
    Route::get('/majors-edit/{id}', [MajorController::class, 'edit']);
    Route::post('/majors-update/{id}', [MajorController::class, 'update']);
    Route::get('/majors-destroy/{id}', [MajorController::class, 'destroy']);

    // subject
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::get('/subjects-create', [SubjectController::class, 'create']);
    Route::post('/subjects-store', [SubjectController::class, 'store']);
    Route::get('/subjects-edit/{id}', [SubjectController::class, 'edit']);
    Route::post('/subjects-update/{id}', [SubjectController::class, 'update']);
    Route::get('/subjects-destroy/{id}', [SubjectController::class, 'destroy']);
});

// Tidak perlu login pun bisa di akses :)
Route::get('/test', function () {
    return view('admin.Table');
});

