<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('index');
});


Route::get('/create', 'App\Http\Controllers\PostController@create')->name('todo.create'); // показывает форму



/*
Route::middleware('cors')->post('/cors', function () {
    return 'Hello World';
});
*/
//Route::middleware('cors')->post('/', 'App\Http\Controllers\PostController@store')->name('todo.store');
Route::get('/csrf-cookie', 'App\Http\Controllers\CsrfController@getCsrfToken');

// CRUD с постами
Route::get('/', 'App\Http\Controllers\PostController@index')->name('index'); // перенаправляет на главную страницу
Route::get('/', 'App\Http\Controllers\PostController@all')->name('post.all'); // показывает все записи
Route::post('/', 'App\Http\Controllers\PostController@store')->name('post.store'); // сохраняет данные
Route::get('/post/{id}','App\Http\Controllers\PostController@show'); // показывает конкретный пост
Route::delete('/post/{id}', 'App\Http\Controllers\PostController@delete')->name('post.delete'); // удаление поста
Route::put('/post/{id}', 'App\Http\Controllers\PostController@update')->name('post.update'); // обновление поста
//Route::get('/', 'App\Http\Controllers\PostController@edit')->name('post.edit'); // перенаправляет на страницу с изменением поста
Route::get('/post/{id}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');


Route::get('/count', 'App\Http\Controllers\PostController@getPostCount'); // показывает количество записей

// CRUD с категориями
Route::get('/category', 'App\Http\Controllers\CategoryController@categoryIndex')->name('categoryIndex'); // перенаправляет на главную страницу
Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('category.store'); // сохраняет данные
Route::get('/category/{id}','App\Http\Controllers\CategoryController@show'); // показывает конкретный пост
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete'); // удаление поста
Route::put('/category/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update'); // обновление поста
Route::get('/category/{id}/edit', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');

// CRUD со статусами
Route::get('/status', 'App\Http\Controllers\StatusController@statusIndex')->name('statusIndex');
Route::post('/status', 'App\Http\Controllers\StatusController@store')->name('status.store'); // сохраняет данные
Route::get('/status/{id}','App\Http\Controllers\StatusController@show'); // показывает конкретный пост
Route::delete('/status/{id}', 'App\Http\Controllers\StatusController@delete')->name('status.delete'); // удаление поста
Route::put('/status/{id}', 'App\Http\Controllers\StatusController@update')->name('status.update'); // обновление поста
Route::get('/status/{id}/edit', 'App\Http\Controllers\StatusController@edit')->name('status.edit');
