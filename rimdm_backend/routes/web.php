<?php

use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\DashBoardController;
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
    ->name('dashboard');

Route::prefix('/admin')->group(function(){
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/loginPost', [AuthenticationController::class, 'loginPost'])->name('loginPost');
});


