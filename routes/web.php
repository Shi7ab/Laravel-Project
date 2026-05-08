<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/postRoute.php';
require __DIR__.'/AuthRoute.php';

Route::get('/', function () {
    return view('welcome');
});

 

// This route can ONLY be accessed with a valid Bearer Token
Route::middleware('auth:sanctum')->get('/user-profile', function (Request $request) {
    return response()->json([
        'message' => 'You are authenticated!',
        'user' => $request->user(), // Returns the logged-in user's data
    ]);
});


