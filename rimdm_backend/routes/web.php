<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Teacher\AuthenticationController;
use App\Http\Controllers\Teacher\DashBoardController;
use App\Http\Controllers\Teacher\TeacherController;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/admin/{dashboard?}', [DashboardController::class, 'index'])
    ->where('dashboard', 'dashboard|home')
    ->name('dashboard')->middleware('admin');

Route::prefix('/teacher')->group(function(){

    Route::get('/login', [AuthenticationController::class, 'login'])->name('teacher.login');
    Route::post('/loginPost', [AuthenticationController::class, 'loginPost'])->name('teacher.loginPost');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('teacher.logout');
    Route::get('/profile', function () {return view('teacher.profile');})->name('teacher.profile')->middleware('teacher');


    Route::get('/create/student', [StudentController::class, 'create'])->name('student.create')->middleware('admin');
    Route::post('/store/student', [StudentController::class, 'store'])->name('student.store')->middleware('admin');
    Route::get('/students', [StudentController::class, 'index'])->name('student.index')->middleware('admin');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy')->middleware('admin');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('student.update')->middleware('admin');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit')->middleware('admin');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('student.show')->middleware('admin');

});

Route::resource('/admins', AdminController::class)->middleware('admin');

Route::resource('/teachers', TeacherController::class)->middleware('admin');

Route::resource('/subjects', SubjectController::class);
