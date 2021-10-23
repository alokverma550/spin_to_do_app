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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/posts', [App\Http\Controllers\HomeController::class, 'posts'])->name('posts');
Route::get('/home/post/{id}', [App\Http\Controllers\HomeController::class, 'post'])->name('post');

/* ToDo Post API */
Route::post('/home/todo', [App\Http\Controllers\HomeController::class, 'todoPost'])->name('todo_post');
Route::post('/home/todoEdit', [App\Http\Controllers\HomeController::class, 'todoPostEdit'])->name('todo_post_edit');
