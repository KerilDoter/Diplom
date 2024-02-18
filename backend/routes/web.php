<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('index');
});

Route::get('/', 'App\Http\Controllers\PostController@index')->name('todoIndex'); // показывает все записи
Route::get('/create', 'App\Http\Controllers\PostController@create')->name('todo.create'); // показывает форму
Route::post('/', 'App\Http\Controllers\PostController@store')->name('todo.store'); // сохраняет данные
