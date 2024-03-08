<?php

use App\Http\Controllers\Web\CommentsController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{post}', [HomeController::class, 'post'])->name('post');


Route::prefix('/comentarios')->name('comments.')->middleware('auth:admin')->controller(CommentsController::class)->group(function () {
    Route::post('/', 'store')->name('store');
});
