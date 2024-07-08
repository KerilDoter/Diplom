<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('index');
});

Route::get('/create', 'App\Http\Controllers\PostController@create')->name('todo.create');
Route::get('/csrf-cookie', 'App\Http\Controllers\CsrfController@getCsrfToken');

// CRUD с постами
Route::get('/', 'App\Http\Controllers\PostController@index')->name('post.index');
Route::post('/', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('post.create');
Route::get('/post/{id}','App\Http\Controllers\PostController@show');
Route::delete('/post/{id}', 'App\Http\Controllers\PostController@delete')->name('post.delete');
Route::put('/post/{id}', 'App\Http\Controllers\PostController@update')->name('post.update');
//Route::get('/', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::get('/post/{id}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');

Route::post('/post/{id}/moderated', 'App\Http\Controllers\ModeratedController@store')->name('moderator.store');
Route::get('/count', 'App\Http\Controllers\PostController@getPostCount');
Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category.index');
Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('category.store');
Route::get('/category/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
Route::get('/category/{id}','App\Http\Controllers\CategoryController@show');
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete');
Route::put('/category/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update');
Route::get('/category/{id}/edit', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');


Route::get('/status', 'App\Http\Controllers\StatusController@index')->name('status.index');
Route::post('/status', 'App\Http\Controllers\StatusController@store')->name('status.store');
Route::get('/status/create', 'App\Http\Controllers\StatusController@create')->name('status.create');
Route::get('/status/{id}','App\Http\Controllers\StatusController@show'); // показывает конкретный пост
Route::delete('/status/{id}', 'App\Http\Controllers\StatusController@delete')->name('status.delete');
Route::put('/status/{id}', 'App\Http\Controllers\StatusController@update')->name('status.update');
Route::get('/status/{id}/edit', 'App\Http\Controllers\StatusController@edit')->name('status.edit');



Route::get('/tag', 'App\Http\Controllers\TagController@index')->name('tag.index');
Route::post('/tag', 'App\Http\Controllers\TagController@store')->name('tag.store');
Route::get('/tag/create', 'App\Http\Controllers\TagController@create')->name('tag.create');
Route::get('/tag/{id}','App\Http\Controllers\TagController@show');
Route::delete('/tag/{id}', 'App\Http\Controllers\TagController@delete')->name('tag.delete');
Route::put('/tag/{id}', 'App\Http\Controllers\TagController@update')->name('tag.update');
Route::get('/tag/{id}/edit', 'App\Http\Controllers\TagController@edit')->name('tag.edit');



// Регистрация
Route::get('/register', 'App\Http\Controllers\UserController@create')->name('user.register');

// Авторизация
Route::get('/login', 'App\Http\Controllers\UserController@loginForm')->name('login.create');
Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');




Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::delete('/users/{user}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');
Route::post('/users/{user}/makeAdmin', 'App\Http\Controllers\UserController@makeAdmin')->name('user.makeAdmin');
Route::post('/users/{user}/destroyAdmin', 'App\Http\Controllers\UserController@makeAdmin')->name('user.destroyAdmin');
Route::get('/register/student', 'App\Http\Controllers\UserController@viewStudent')->name('register.viewStudent');
Route::post('/register/student', 'App\Http\Controllers\UserController@storeStudent')->name('register.storeStudent');
Route::put('/student/{id}', 'App\Http\Controllers\UserController@updateStudent')->name('student.update');
Route::get('/student/{id}/', 'App\Http\Controllers\UserController@LKStudent')->name('student.lk');
Route::get('/student/{id}/edit', 'App\Http\Controllers\UserController@editStudent')->name('student.edit');
Route::get('/register/teacher', 'App\Http\Controllers\UserController@viewTeacher')->name('register.viewTeacher');
Route::post('/register/teacher', 'App\Http\Controllers\UserController@storeTeacher')->name('register.storeTeacher');
Route::put('/teacher/{id}', 'App\Http\Controllers\UserController@updateTeacher')->name('teacher.update');
Route::get('/teacher/{id}/', 'App\Http\Controllers\UserController@LKTeacher')->name('teacher.lk');
Route::get('/teacher/{id}/edit', 'App\Http\Controllers\UserController@editTeacher')->name('teacher.edit');
