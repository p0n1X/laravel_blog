<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\CategoryController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/show/{post}', [PostController::class, 'show']);
Route::get('/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);
Route::post('/delete', [PostController::class, 'delete']);
Route::get('/edit/{post}', [PostController::class, 'edit']);
Route::patch('/update', [PostController::class, 'update']);

Route::post('/comment/create', [CommentController::class, 'create']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/post', [CategoryController::class, 'store']);
Route::patch('/category/update', [CategoryController::class, 'update']);
Route::get('/category/edit/{category}', [CategoryController::class, 'edit']);
Route::post('/category/delete', [CategoryController::class, 'delete']);
Route::get('/category/{category}', [CategoryController::class, 'show']);
