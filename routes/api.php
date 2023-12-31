<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/posts", "App\Http\Controllers\PostController@index");
Route::get("/posts/{post}", "App\Http\Controllers\PostController@show");
// Route::post('/posts/{post}/like', "App\Http\Controllers\PostController@like")->name("like-post");
// Route::post('/posts/{post}/comments/{comment}/like', "App\Http\Controllers\CommentController@like")->name("like-comment");
