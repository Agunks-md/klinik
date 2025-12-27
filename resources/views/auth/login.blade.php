<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Smart Clinic 4.0</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .login-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            padding: 32px;
            border-radius: 14px;
            box-shadow: 0 20px 40px rgba(0,0,0,.08);
            text-align: center;
        }

        .login-card h2 {
            margin-bottom: 6px;
            font-size: 26px;
            font-weight: 700;
            color: #0f172a;
        }

        .login-card p {
            color: #64748b;
            margin-bottom: 28px;
        }

        label {
            display: block;
            text-align: left;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            margin-bottom: 18px;
            outline: none;
            background: #f8fafc;
        }

        input:focus {
            border-color: #0ea5e9;
            background: #ffffff;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: #0f3b5f;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .btn-login:hover {
            background: #0c2f4d;
        }

        .forgot {
            display: block;
            margin-top: 14px;
            font-size: 14px;
            color: #0ea5e9;
            text-decoration: none;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 14px;
            text-align: left;
        }

        footer {
            background: #0f3b5f;
            color: #e2e8f0;
            text-align: center;
            padding: 14px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <h2>Login</h2>
        <p>Silakan masuk ke sistem Smart Clinic</p>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

       <form method="POST" action="{{ route('login') }}">
    @csrf

    <label>Email</label>
    <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        required
        autofocus
    >

    <label>Password</label>
    <input
        type="password"
        name="password"
        required
    >

    <button type="submit" class="btn-login">
        Login
    </button>

    @if (Route::has('password.request'))
        <a class="forgot" href="{{ route('password.request') }}">
            Forgot your password?
        </a>
    @endif
</form>


    </div>
</div>

<footer>
    © 2025 Smart Clinic 4.0 — IoT Monitoring System
</footer>

</body>
</html>
