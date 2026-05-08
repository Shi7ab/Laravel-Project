@extends('layout.master')
@section('content')
    <div class="text-center d-flex justify-content-center align-items-center" style="height: 60vh;">
        <form method="POST" id="loginForm" class="w-50">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <script>
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const response = await fetch('/login', {
            method: 'POST',
            body: formData,
            headers: { 'Accept': 'application/json' }
        });

        const data = await response.json();

        if (response.ok) {
            // Save token to LocalStorage so the browser "remembers" you
            // localStorage.setItem('auth_token', data.access_token);
            session_id = data.access_token; // Store token in a variable for this session
            date = new Date();
            if (session_id) {
                document.cookie = `auth_token=${session_id}; expires=${new Date(date.getTime() + 60 * 60 * 1000).toUTCString()}; path=/`;
                session_id = null; // Clear the variable after setting the cookie
            }

            window.location.href = '/posts'; // Redirect to posts page after successful login
        } else {
            document.getElementById('message').innerText = data.message || 'Login Failed';
        }
    });
</script>
@endsection
