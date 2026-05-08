<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/posts',[PostController::class, 'posts']);

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::delete('/posts/{post}',[PostController::class, 'delete'])->name('posts.delete');

Route::get('/search_result', [PostController::class, 'search'])->name('posts.search');

