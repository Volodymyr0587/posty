<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])
    ->middleware('auth')
    ->name('posts.likes');
Route::delete('/posts/{slug}/likes', [PostLikeController::class, 'destroy'])
    ->middleware('auth')
    ->name('posts.likes');
