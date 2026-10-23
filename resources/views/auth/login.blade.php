<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Employee Management System</title>
    <style>
        :root {
            --purple: #7c3aed;
            --purple-dark: #5b21b6;
            --purple-soft: #f5f3ff;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: Arial, sans-serif;
            color: var(--text);
            background: linear-gradient(135deg, #f5f3ff, #ede9fe);
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            padding: 42px;
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(255, 255, 255, .8);
            border-radius: 20px;
            box-shadow: 0 20px 55px rgba(91, 33, 182, .14);
        }

        h1 {
            margin: 0;
            text-align: center;
            font-size: 28px;
            letter-spacing: -.5px;
        }

        .subtitle {
            margin: 10px 0 30px;
            color: var(--muted);
            text-align: center;
            font-size: 14px;
        }

        .field { margin-bottom: 19px; }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            outline: none;
            color: var(--text);
            font: inherit;
            background: #fff;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus {
            border-color: var(--purple);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, .12);
        }

        .error {
            margin-bottom: 20px;
            padding: 12px 14px;
            border: 1px solid #fecaca;
            border-radius: 10px;
            color: #b91c1c;
            font-size: 13px;
            background: #fef2f2;
        }

        button {
            width: 100%;
            margin-top: 6px;
            padding: 14px;
            border: 0;
            border-radius: 10px;
            color: white;
            font: inherit;
            font-weight: bold;
            cursor: pointer;
            background: linear-gradient(135deg, var(--purple), var(--purple-dark));
            box-shadow: 0 8px 18px rgba(124, 58, 237, .25);
            transition: transform .2s, box-shadow .2s;
        }

        button:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(124, 58, 237, .32);
        }

        button:active { transform: translateY(0); }

        .footer {
            margin: 26px 0 0;
            color: var(--muted);
            text-align: center;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .login-card { padding: 30px 22px; }
        }
    </style>
</head>
<body>
    <main class="login-card">
        <h1>Welcome back</h1>
        <p class="subtitle">Sign in to your Employee Management System</p>

        @if ($errors->any())
            <div class="error" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="field">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Enter your username"
                    autocomplete="username"
                    required
                    autofocus
                >
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit">Sign in</button>
        </form>

        <p class="footer">Employee Management System</p>
    </main>
</body>
</html>