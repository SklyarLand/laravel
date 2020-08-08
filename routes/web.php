<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('posts','PostsController@index');
Route::get('posts/{post}','PostsController@show');
Route::get('home/{user}/posts', 'PostsController@getUserPosts');

Route::get('tasks', 'TasksController@index')->name('tasks.index');
Route::get('tasks/create', 'TasksController@create');
Route::post('tasks/publish', 'TasksController@publish');
Route::get('tasks/success', 'TasksController@success');
Route::get('tasks/fail', 'TasksController@fail');
Route::get('tasks/{id}', 'TasksController@show');
Route::post('tasks/{id}/update', 'TasksController@update');
Route::get('/', 'TasksController@index');

Route::get('/home', 'HomeController@index')->name('home');
