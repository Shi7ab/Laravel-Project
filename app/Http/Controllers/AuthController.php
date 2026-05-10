<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Validation;

class AuthController extends Controller
{
    //
    public function register(Request $request , Validation $validation) {
        // 1. Validate
        $validatedData = $request->validate($validation::users());

        // 2. Create User (Hash the password!)
        $user = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // OR Hash::make()
        ]);

        // 3. Return JSON response
        return response()->json([
            'message' => 'User created successfully',
            'user'    => $user
        ], 201);
    }

    public function login(Request $request, Validation $validation) {
        
        $validatedData = $request->validate( Validation::login());

        // Auth::attempt handles finding the user and checking the password hash
        if (!Auth::attempt($validatedData)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        
        // Auth::user() retrieves the authenticated user
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(){
        if (session_status() == PHP_SESSION_ACTIVE) {
             Auth::logout();
            $_SESSION['message'] = 'Logged out successfully';
            $_COOKIE['message'] = 'Logged out successfully';
         }
       return redirect()->route('auth.login')->with('success', 'Logged out successfully!');
    }


    // This method is to show the login form (for web access)
    public function showLoginForm() {
        return view('auth.login'); // Make sure you have this view created
     }
    public function showRegistrationForm() {
        return view('auth.register'); // Make sure you have this view created
     }

    public function profile() {
        $user = Auth::user();
        return view('posts.profile', compact('user')); // Make sure you have this view created
    }
}
