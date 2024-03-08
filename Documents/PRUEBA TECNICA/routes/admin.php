<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/olvido-de-contraseña', [AuthController::class, 'forgotPassword'])->name('forgotPassword')->middleware('guest');
Route::post('/olvido-de-contraseña', [AuthController::class, 'sendForgotPasswordEmail'])->name('sendForgotPasswordEmail')->middleware('guest');
Route::get('/recuperar-contraseña/{token}', [AuthController::class, 'resetPasswordForm'])->name('resetPasswordForm')->middleware('guest');
Route::post('/recuperar-contraseña', [AuthController::class, 'resetPassword'])->name('resetPassword')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::prefix('/post')->name('posts.')->controller(PostsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/crear', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{post}/editar', 'edit')->name('edit');
        Route::put('/{post}', 'update')->name('update');
        Route::delete('/{post}', 'destroy')->name('destroy');
    });
});
