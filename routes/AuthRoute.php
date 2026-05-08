<?php


require __DIR__.'/postRoute.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// This route to access the login UI
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth:sanctum');
