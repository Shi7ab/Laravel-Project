<?php


require __DIR__.'/postRoute.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

// This route to access the login UI
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.login');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth:sanctum');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile')->middleware('auth:sanctum');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth:sanctum');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store')->middleware('auth:sanctum');
