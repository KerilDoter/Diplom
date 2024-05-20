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
Route::get('/', 'App\Http\Controllers\PostController@index')->name('post.index'); // перенаправляет на главную страницу
Route::post('/', 'App\Http\Controllers\PostController@store')->name('post.store'); // сохраняет данные
Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('post.create'); // сохраняет данные
Route::get('/post/{id}','App\Http\Controllers\PostController@show'); // показывает конкретный пост
Route::delete('/post/{id}', 'App\Http\Controllers\PostController@delete')->name('post.delete'); // удаление поста
Route::put('/post/{id}', 'App\Http\Controllers\PostController@update')->name('post.update'); // обновление поста
//Route::get('/', 'App\Http\Controllers\PostController@edit')->name('post.edit'); // перенаправляет на страницу с изменением поста
Route::get('/post/{id}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');

Route::post('/post/{id}/moderated', 'App\Http\Controllers\ModeratedController@store')->name('moderator.store'); // сохраняет данные
Route::get('/count', 'App\Http\Controllers\PostController@getPostCount'); // показывает количество записей

// CRUD с категориями
Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category.index'); // перенаправляет на главную страницу
Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('category.store'); // сохраняет данные
Route::get('/category/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
Route::get('/category/{id}','App\Http\Controllers\CategoryController@show'); // показывает конкретный пост
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete'); // удаление поста
Route::put('/category/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update'); // обновление поста
Route::get('/category/{id}/edit', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');

// CRUD со статусами
Route::get('/status', 'App\Http\Controllers\StatusController@index')->name('status.index');
Route::post('/status', 'App\Http\Controllers\StatusController@store')->name('status.store'); // сохраняет данные
Route::get('/status/create', 'App\Http\Controllers\StatusController@create')->name('status.create');
Route::get('/status/{id}','App\Http\Controllers\StatusController@show'); // показывает конкретный пост
Route::delete('/status/{id}', 'App\Http\Controllers\StatusController@delete')->name('status.delete'); // удаление поста
Route::put('/status/{id}', 'App\Http\Controllers\StatusController@update')->name('status.update'); // обновление поста
Route::get('/status/{id}/edit', 'App\Http\Controllers\StatusController@edit')->name('status.edit');


// CRUD с тегами
Route::get('/tag', 'App\Http\Controllers\TagController@index')->name('tag.index');
Route::post('/tag', 'App\Http\Controllers\TagController@store')->name('tag.store'); // сохраняет данные
Route::get('/tag/create', 'App\Http\Controllers\TagController@create')->name('tag.create');
Route::get('/tag/{id}','App\Http\Controllers\TagController@show'); // показывает конкретный пост
Route::delete('/tag/{id}', 'App\Http\Controllers\TagController@delete')->name('tag.delete'); // удаление поста
Route::put('/tag/{id}', 'App\Http\Controllers\TagController@update')->name('tag.update'); // обновление поста
Route::get('/tag/{id}/edit', 'App\Http\Controllers\TagController@edit')->name('tag.edit');



// Регистрация
Route::get('/register', 'App\Http\Controllers\UserController@create')->name('user.register'); // показывает форму с регистрацией

// Авторизация
Route::get('/login', 'App\Http\Controllers\UserController@loginForm')->name('login.create'); // показывает форму с авторизацией
Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login'); // сохраняет данные
Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout'); // выходит из профиля




Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index'); // показывает форму с регистрацией
Route::delete('/users/{user}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');
Route::post('/users/{user}/makeAdmin', 'App\Http\Controllers\UserController@makeAdmin')->name('user.makeAdmin');


Route::post('/users/{user}/destroyAdmin', 'App\Http\Controllers\UserController@makeAdmin')->name('user.destroyAdmin');
// STUDENT
Route::get('/register/student', 'App\Http\Controllers\UserController@viewStudent')->name('register.viewStudent'); // показывает страницу с формой студента
Route::post('/register/student', 'App\Http\Controllers\UserController@storeStudent')->name('register.storeStudent'); // сохраняет данные с формы студента

Route::put('/student/{id}', 'App\Http\Controllers\UserController@updateStudent')->name('student.update');
Route::get('/student/{id}/', 'App\Http\Controllers\UserController@LKStudent')->name('student.lk');
Route::get('/student/{id}/edit', 'App\Http\Controllers\UserController@editStudent')->name('student.edit');


// TEACHER
Route::get('/register/teacher', 'App\Http\Controllers\UserController@viewTeacher')->name('register.viewTeacher'); // показывает страницу с формой преподавателя
Route::post('/register/teacher', 'App\Http\Controllers\UserController@storeTeacher')->name('register.storeTeacher'); // сохраняет данные с формы преподавателя

Route::put('/teacher/{id}', 'App\Http\Controllers\UserController@updateTeacher')->name('teacher.update'); // обновление поста
Route::get('/teacher/{id}/', 'App\Http\Controllers\UserController@LKTeacher')->name('teacher.lk');
Route::get('/teacher/{id}/edit', 'App\Http\Controllers\UserController@editTeacher')->name('teacher.edit');
