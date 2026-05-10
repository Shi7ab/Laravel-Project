<?php

// use Illuminate\Contracts\Validation\ValidationRule;
// use Illuminate\Foundation\Http\FormRequest;

namespace App\Http\Requests;

class Validation
{
    public static function users($userId = null): array
    {
        return [
            'name' => 'required|string|max:80',

            'email' => 'required|email|unique:users,email,' . $userId,

            'role' => 'string|in:user,admin',

            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public static function login(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ];
    }
    public static function profiles(): array
    {
        return [
            'user_id' => 'exists:users,id',

            'image' => 'nullable|string',

            'phone' => 'nullable|string',

            'address' => 'nullable|string',

            'bio' => 'nullable|string',
        ];
    }

    public static function posts(): array
    {
        return [
            'title' => 'required|string|max:255',

            'content' => 'required|string',

            'image' => 'nullable|string',
        ];
    }
}