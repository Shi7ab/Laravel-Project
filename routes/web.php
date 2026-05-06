<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});



// 1- define new route so the  user can access it through the url http://localhost:8000/posts
// 2- define the controller that render a veiw
// 3- define the view that contain list of posts
// 4- remove any static html data from view

Route::get('/posts',[PostController::class, 'posts']);

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::delete('/posts/{post}',[PostController::class, 'delete'])->name('posts.delete');

 // *********** explining the route parameters ***********

// Route::get('/contact', [PostController::class, 'firstAction']);

// Route::get('/great', [PostController::class, 'great']);

// class Post {
//     public static function hello() {
//         return "Hello from Post class!";
//     }
// }

// Post::hello();
