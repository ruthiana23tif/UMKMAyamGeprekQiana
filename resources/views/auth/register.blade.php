<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <div style="background: url('{{ asset('build/assets/abc.png') }}') no-repeat center center fixed; background-size: cover; height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0; padding: 0;">
</head>
<body>
    <div class="guest-layout">
        <form method="POST" action="/register">
            <!-- Tambahkan token CSRF secara manual jika diperlukan -->
            <input type="hidden" name="_token" value="CSRF_TOKEN_HERE">

            <!-- Logo -->
        <div class="logo-container">
            <img src="../build/assets/logo.png" alt="Logo" class="form-logo">

        </div>

            <!-- Name -->
            <div>
                <label for="name">Name</label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name">
                <div class="input-error mt-2">
                    <!-- Error message for name -->
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username">
                <div class="input-error mt-2">
                    <!-- Error message for email -->
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
                <div class="input-error mt-2">
                    <!-- Error message for password -->
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
                <div class="input-error mt-2">
                    <!-- Error message for password confirmation -->
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/login">
                    Already registered?
                </a>
                <button type="submit" class="ms-4 primary-button">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>
