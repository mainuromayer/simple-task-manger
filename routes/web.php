<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeammateController;
use App\Http\Controllers\TaskAssignController;

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

Route::get('/', function () {
    return redirect('/login');
});



Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginCheck'])->name('login.check');

Route::get('/signup', [UserController::class, 'signup'])->name('signup');
Route::post('/signup', [UserController::class, 'store'])->name('signup.store');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::group(['prefix' => 'teammate'], function () {
        Route::get('/', [TeammateController::class, 'index'])->name('teammate');
        Route::get('/create', [TeammateController::class, 'create'])->name('teammate.create');
        Route::post('/store', [TeammateController::class, 'store'])->name('teammate.store');
        Route::get('/edit/{id}', [TeammateController::class, 'edit'])->name('teammate.edit');
        Route::post('/update/{id}', [TeammateController::class, 'update'])->name('teammate.update');
        Route::delete('/destroy/{id}', [TeammateController::class, 'destroy'])->name('teammate.destroy');
    });
    Route::group(['prefix' => 'project'], function () {
        Route::get('/', [ProjectController::class, 'index'])->name('project');
        Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/destroy/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    });

    Route::group(['prefix' => 'task'], function () {
        Route::get('/', [TaskController::class, 'index'])->name('task');
        Route::get('/create', [TaskController::class, 'create'])->name('task.create');
        Route::post('/store', [TaskController::class, 'store'])->name('task.store');
        Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
        Route::post('/update/{id}', [TaskController::class, 'update'])->name('task.update');
        Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
    });

    Route::group(['prefix' => 'task_assign'], function () {
        Route::get('/', [TaskAssignController::class, 'index'])->name('task_assign');
        Route::get('/create', [TaskAssignController::class, 'create'])->name('task_assign.create');
        Route::post('/store', [TaskAssignController::class, 'store'])->name('task_assign.store');
    });
});

Route::middleware(['auth', 'role:teammate'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

