<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('todos')->as('todos.')->controller(TodoController::class)->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('criar', 'create')->name('create');
        Route::post('criar', 'store')->name('store');
        Route::get('ver/{id}', 'show')->name('show');
        Route::get('{id}/editar', 'edit')->name('edit');
        Route::put('atualizar', 'update')->name('update');
        Route::delete('deletar', 'destroy')->name('destroy');
    });
});

require __DIR__.'/auth.php';
