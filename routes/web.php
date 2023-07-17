<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LophocController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User1Controller;

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


// Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::get('/user/create', [UserController::class, 'create']);
// Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
// Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
// Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
// Route::delete('user/delete/{id}',UserController::class,'destroy')->name('user.destroy');

Route::resource('user1',User1Controller::class);



