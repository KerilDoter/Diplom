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
