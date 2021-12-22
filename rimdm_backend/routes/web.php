<?php

use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\AuthenticationController;
use App\Http\Controllers\Teacher\DashBoardController;
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
});

Route::get('/admin/{dashboard?}', [DashboardController::class, 'index'])
    ->where('dashboard', 'dashboard|home')
    ->name('dashboard')->middleware('admin');

Route::prefix('/teacher')->group(function(){
    Route::get('/login', [AuthenticationController::class, 'login'])->name('teacher.login');
    Route::post('/loginPost', [AuthenticationController::class, 'loginPost'])->name('teacher.loginPost');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('teacher.logout');
    Route::get('/profile', function () {return view('teacher.profile');})->name('teacher.profile')->middleware('teacher');


    Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
    Route::post('/store/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/students', [StudentController::class, 'index'])->name('student.index');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');


});


