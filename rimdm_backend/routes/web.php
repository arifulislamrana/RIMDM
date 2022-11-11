<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassLevel\ClassLevelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Notice\NoticeController as NoticeNoticeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\Student\StudentAuthContrroller;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Teacher\AuthenticationController;
use App\Http\Controllers\Teacher\DashBoardController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\TeachersController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/admin/{dashboard?}', [DashboardController::class, 'index'])
    ->where('dashboard', 'dashboard|home')
    ->name('dashboard')->middleware('admin');

Route::prefix('/teacher')->group(function(){

    Route::get('/login', [AuthenticationController::class, 'login'])->name('teacher.login');
    Route::post('/loginPost', [AuthenticationController::class, 'loginPost'])->name('teacher.loginPost');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('teacher.logout');


    Route::get('/create/student', [StudentController::class, 'create'])->name('student.create')->middleware('admin');
    Route::post('/store/student', [StudentController::class, 'store'])->name('student.store')->middleware('admin');
    Route::get('/students', [StudentController::class, 'index'])->name('student.index')->middleware('admin');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy')->middleware('admin');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('student.update')->middleware('admin');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit')->middleware('admin');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show')->middleware('admin');

});

Route::resource('/admins', AdminController::class)->middleware('admin');

Route::resource('/classLevels', ClassLevelController::class)->middleware('admin');

Route::resource('/teachers', TeacherController::class)->middleware('admin');

Route::get('/teacher/profile/{id}', [DashBoardController::class, 'showTeacherwhoIsNotAdmin'])->name('teacher.profile');

Route::resource('/subjects', SubjectController::class)->middleware('admin');

Route::resource('/notices', NoticeNoticeController::class)->middleware('admin');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact/Q&A', [ContactController::class, 'contactWithAuth'])->name('contact.qa');

Route::get('/teachersList', [TeachersController::class, 'index'])->name('teachers');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/noticeList', [NoticeController::class, 'index'])->name('notice');

Route::get('/notice/{notice}', [NoticeController::class, 'show'])->name('notice.details');

Route::get('/classes', [ClassController::class, 'index'])->name('classes');

Route::get('/student/login', [StudentAuthContrroller::class, 'showLoginForm'])->name('student.login');

Route::post('/student/login/post', [StudentAuthContrroller::class, 'loginPost'])->name('student.loginPost');

Route::get('/student/logout', [StudentAuthContrroller::class, 'logout'])->name('student.logout');

Route::get('/student/myProfile/{id}', [StudentAuthContrroller::class, 'show'])->name('student.show')->middleware('auth');

Route::get('/student/apply', [ApplyController::class, 'apply'])->name('apply');

Route::post('/student/apply/post', [ApplyController::class, 'applyPost'])->name('apply.post');

Route::get('/show/class/{id}', [ClassController::class, 'showClass'])->name('showClass');

Route::get('/public/profile/teacher/{id}', [App\Http\Controllers\TeachersController::class, 'showTeacher'])->name('showTeacherToUsers');
