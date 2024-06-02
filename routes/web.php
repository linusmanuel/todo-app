<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('todos')->as('todos.')->controller(TodoController::class)->group(function() {
    Route::get('index', 'Index')->name('index');
    Route::get('criar', 'Create')->name('create');
    Route::post('criar', 'Store')->name('store');
    Route::get('ver/{id}', 'Show')->name('show');
    Route::get('{id}/editar', 'Edit')->name('edit');
    Route::put('atualizar', 'update')->name('update');
    Route::delete('deletar', 'destroy')->name('destroy');
});
