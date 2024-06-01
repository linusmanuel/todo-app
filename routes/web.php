<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('todos/index', [TodoController::class, 'Index'])->name('todos.index');
Route::get('todos/criar', [TodoController::class, 'Create'])->name('todos.create');
Route::post('todos/criar', [TodoController::class, 'Store'])->name('todos.store');
Route::get('todos/ver/{id}', [TodoController::class, 'Show'])->name('todos.show');
Route::get('todos/{id}/editar', [TodoController::class, 'Edit'])->name('todos.edit');
Route::put('todos/atualizar', [TodoController::class, 'update'])->name('todos.update');

