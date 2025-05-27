<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login - Dapur Malika</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');
        * {
            margin: 0; padding: 0; box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('/images/background.jpg') no-repeat center center/cover;
            position: relative;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px);
        }
        .login-container {
            display: flex;
            width: 800px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease-in-out;
            position: relative;
            z-index: 1;
        }
        .login-image {
            width: 50%;
            background: url('/images/login-bg.jpg') no-repeat center center/cover;
        }
        .login-form {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #e65100, #ff6f00);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: linear-gradient(45deg, #bf360c, #e65100);
            transform: scale(1.05);
        }
        .login-footer {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }
        .login-footer a {
            color: #ff6f00;
            text-decoration: none;
            font-weight: bold;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }
        .alert {
            width: 100%;
            padding: 10px;
            background: #ff4d4d;
            color: white;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>

        <div class="login-form">
            <h2>Login Admin</h2>
            
            @if(session('error'))
                <div class="alert">{{ session('error') }}</div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Email" required autofocus>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>

            <div class="login-footer">
                <p><a href="{{ route('admin.password.request') }}">Lupa Password?</a></p>
            </div>
        </div>
    </div>
</body>
</html>
