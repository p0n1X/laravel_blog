<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('post', [PostController::class, 'post_get_api']);
Route::post('post', [PostController::class, 'post_post_api']);
Route::put('post/edit/{id}', [PostController::class, 'post_edit_api']);
Route::delete('post/edit/{id}', [PostController::class, 'post_delete_api']);
