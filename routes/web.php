<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/posts', PostController::class);
    Route::get('/trashed', [PostController::class, 'trashed'])->name('trashed.index');
    Route::put('/restore/{post}', [PostController::class, 'restore'])->name('restore.update');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/admin', [UserController::class, 'admin'])->name('users.admin');
});
