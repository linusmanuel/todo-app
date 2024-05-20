<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('todos/index', [TodoController::class, 'Index'])->name('Index');
Route::get('todos/criar', [TodoController::class, 'Store'])->name('Store');
Route::get('todos/editar', [TodoController::class, 'EditTodo'])->name('EditTodo');
