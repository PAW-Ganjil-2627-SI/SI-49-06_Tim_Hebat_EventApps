<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pengelolaan Event & Workshop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="logo">Sistem Pengelolaan Event & Workshop</div>
    </header>

    <main class="container" style="max-width: 400px; margin-top: 50px;">
        <div class="header-section">
            <h2>Login Akun</h2>
        </div>

        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="form-card">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="admin@gmail.com" required autofocus>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            </div>
        </form>
    </main>

</body>
</html>