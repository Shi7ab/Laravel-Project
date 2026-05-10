<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
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
        <div id="message" class="text-danger mt-3"></div>
    </div>
    <div class="text-center">
        @if(!Auth::check())
            <li class="nav-item">   
                    <a class="nav-link" href="/register">Register</a>
                </li>
        @endif
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
              const expire = document.cookie = `auth_token=${session_id}; expires=${new Date(date.getTime() + 60 * 60 * 1000).toUTCString()}; path=/`;
                session_id = null; // Clear the variable after setting the cookie
                if (expire) {
                    location.reload(); // Reload the page to ensure the cookie is set before redirecting
                    console.log('Token stored in cookie successfully');
                } else {
                    console.error('Failed to store token in cookie');
                }
            }

            window.location.href = '/posts'; // Redirect to posts page after successful login
        } else {
            document.getElementById('message').innerText = data.message || 'Login Failed';
        }
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
