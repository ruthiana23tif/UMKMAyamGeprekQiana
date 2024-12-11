<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <div style="background: url('{{ asset('build/assets/abc.png') }}') no-repeat center center fixed; background-size: cover; height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0; padding: 0;">
</head>
<body>
    <div class="background">
        <div class="form-container">
            <img src="build/assets/logo.png" alt="Logo Ayam Geprek">
            <!-- Title -->
            <h1 class="form-title" >Login</h1>
            <form method="POST" action="/login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Email Address -->
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required autofocus>
                </div>

                <!-- Password -->
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <!-- Remember Me -->
                <div class="checkbox">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Remember me</label>
                </div>

                <!-- Forgot Password -->
                <div style="margin-top: 10px;">
                    <a href="/forgot-password">Forgot your password?</a>
                </div>

                <!-- Submit Button -->
                <div style="margin-top: 20px; text-align: right;">
                    <button type="submit">Log in</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
