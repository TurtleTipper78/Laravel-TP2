<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;


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

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/register', [UserController::class, 'register'])->name('users.register');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::middleware('auth')->group(function () {
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/info/{user}', [UserController::class, 'info'])->name('users.info');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('users.delete');
});

Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::middleware('auth')->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/articles/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/articles/update/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/articles/delete/{article}', [ArticleController::class, 'destroy'])->name('article.delete');
});

Route::get('/documents', [DocumentController::class, 'index'])->name('document.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/document/create', [DocumentController::class, 'create'])->name('document.create');
    Route::get('/document/create', [DocumentController::class, 'create'])->name('document.create');
    Route::post('/document', [DocumentController::class, 'store'])->name('document.store');
    Route::get('/document/{id}/edit', [DocumentController::class, 'edit'])->name('document.edit');
    Route::put('/document/{id}', [DocumentController::class, 'update'])->name('document.update');
    Route::delete('/document/{id}', [DocumentController::class, 'delete'])->name('document.delete');
});

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::get('/password/forgot', [UserController::class, 'forgot'])->name('user.forgot');
Route::post('/password/forgot', [UserController::class, 'email'])->name('user.email');
Route::get('/password/reset/{user}/{token}', [UserController::class, 'reset'])->name('user.reset');
Route::put('/password/reset/{user}/{token}', [UserController::class, 'resetUpdate'])->name('user.reset.update');
