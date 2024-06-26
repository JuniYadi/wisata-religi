<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/posts/{slug}', [HomeController::class, 'posts'])->name('posts');
Route::post('/posts/{slug}/comment', [HomeController::class, 'comment'])->name('posts.comment');



