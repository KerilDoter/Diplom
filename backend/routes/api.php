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
Route::get('/', 'App\Http\Controllers\PostController@PostAllToJSON')->name('PostAllToJSON'); // показывает все записи
Route::post('/', 'App\Http\Controllers\PostController@store')->name('todo.store'); // сохраняет данные
Route::get('/post/{id}','App\Http\Controllers\PostController@show'); // показывает конкретный пост
Route::delete('/post/{id}', 'App\Http\Controllers\PostController@delete')->name('post.delete'); // удаление поста
Route::put('/posts/{id}', 'App\Http\Controllers\PostController@update')->name('post.update'); // обновление поста


Route::get('/count', 'App\Http\Controllers\PostController@getPostCount'); // показывает количество записей
// апи категорий
Route::get('/category', 'App\Http\Controllers\CategoryController@CategoryAllToJSON')->name('CategoryAllToJSON'); // показывает все записи
Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('category.store'); // сохраняет данные
Route::get('/category/{id}','App\Http\Controllers\CategoryController@show'); // показывает конкретный пост
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete'); // удаление поста
Route::put('/category/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update'); // обновление поста
