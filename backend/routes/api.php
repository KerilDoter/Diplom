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
Route::post('/', 'App\Http\Controllers\PostController@storeAll')->name('todo.store'); // сохраняет данные
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


// апи статусов
Route::get('/status', 'App\Http\Controllers\StatusController@StatusAllToJSON')->name('StatusAllToJSON'); // показывает все записи
Route::post('/status', 'App\Http\Controllers\StatusController@store')->name('status.store'); // сохраняет данные
Route::get('/status/{id}','App\Http\Controllers\StatusController@show'); // показывает конкретный пост
Route::delete('/status/{id}', 'App\Http\Controllers\StatusController@delete')->name('status.delete'); // удаление поста
Route::put('/status/{id}', 'App\Http\Controllers\StatusController@update')->name('status.update'); // обновление поста

// апи тегов
Route::get('/tag', 'App\Http\Controllers\TagController@TagAllToJSON')->name('TagAllToJSON'); // показывает все записи
Route::post('/tag', 'App\Http\Controllers\TagController@store')->name('tag.store'); // сохраняет данные
Route::get('/tag/{id}','App\Http\Controllers\TagController@show'); // показывает конкретный пост
Route::delete('/tag/{id}', 'App\Http\Controllers\TagController@delete')->name('tag.delete'); // удаление поста
Route::put('/tag/{id}', 'App\Http\Controllers\TagController@update')->name('tag.update'); // обновление поста


// Регистрация и авторизация

// Студенты
Route::post('/register/student', 'App\Http\Controllers\UserController@APIstoreStudent')->name('register.APIstoreStudent'); // сохраняет данные с формы студента
Route::put('/student/{id}', 'App\Http\Controllers\UserController@APIupdateStudent')->name('student.APIupdate'); // обновляет данные

Route::get('/users', 'App\Http\Controllers\UserController@APIindex')->name('user.APIindex'); // показ всех пользователей
Route::get('/user/{id}', 'App\Http\Controllers\UserController@APIshow')->name('user.APIshow'); // показ одного пользователей
// Преподаватели

Route::post('/register/teacher', 'App\Http\Controllers\UserController@APIstoreTeacher')->name('register.APIstoreTeacher'); // сохраняет данные с формы преподавателя
Route::put('/teacher/{id}', 'App\Http\Controllers\UserController@APIupdateTeacher')->name('teacher.APIupdate'); // обновление поста

Route::post('/login', 'App\Http\Controllers\UserController@APIlogin');
Route::get('/user', 'App\Http\Controllers\UserController@APIUser');

