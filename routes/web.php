<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(\App\Http\Controllers\CarsController::class)
    ->prefix('cars')
    ->name('cars.')
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('show/{id}', 'show')->name('show');

        Route::middleware(\App\Http\Middleware\AuthRule::class)->group(function () {
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store');
            Route::get('update/{id}', 'update');
            Route::get('update-store{id}', 'updateStore');
            Route::get('destroy', 'destroy');
        });
});

Route::prefix('articles')
    ->name('articles.')
    ->group(function (){
        Route::get('/', [\App\Http\Controllers\ArticlesController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\ArticlesController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\ArticlesController::class, 'store'])->name('store');
        Route::get('/show/{slug}', [\App\Http\Controllers\ArticlesController::class, 'show'])->name('show');
        Route::get('update/{id}', [\App\Http\Controllers\ArticlesController::class, 'update'])->name('update');
        Route::get('update-store{id}',[\App\Http\Controllers\ArticlesController::class, 'updateStore'])->name('updateStore');
});
