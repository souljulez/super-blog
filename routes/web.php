<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PostController::class, 'index']);

Route::get('/posts', [PostController::class, 'indexPosts'])->name('posts.index');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
