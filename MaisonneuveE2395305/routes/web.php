<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VilleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of the``m will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/ville', [VilleController::class, 'index'])->name('ville.index');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');


Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::get('/user/info/{user}', [UserController::class, 'info'])->name('user.info');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');


Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::get('/password/forgot', [UserController::class, 'forgot'])->name('user.forgot');
Route::post('/password/forgot', [UserController::class, 'email'])->name('user.email');
Route::get('/password/reset/{user}/{token}', [UserController::class, 'reset'])->name('user.reset');
Route::put('/password/reset/{user}/{token}', [UserController::class, 'resetUpdate'])->name('user.reset.update');
