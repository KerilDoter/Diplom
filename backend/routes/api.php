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

// апи постов
Route::get('/', 'App\Http\Controllers\PostController@index')->name('todoIndex'); // показывает все записи
Route::post('/', 'App\Http\Controllers\PostController@store')->name('todo.store'); // сохраняет данные
Route::get('/post/{id}','App\Http\Controllers\PostController@show'); // показывает конкретный пост

Route::get('/count', 'App\Http\Controllers\PostController@getPostCount'); // показывает количество записей
