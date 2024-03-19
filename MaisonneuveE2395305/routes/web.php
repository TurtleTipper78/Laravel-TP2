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
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');



