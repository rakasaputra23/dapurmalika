<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        
        body {
    font-family: 'Poppins', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: url('/images/background.jpg') no-repeat center center/cover;
    background-size: cover;
    background-position: center;
    margin: 0;
    position: relative;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: inherit;
    filter: blur(10px);
    z-index: -1;
}

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease-in-out;
            backdrop-filter: blur(10px);
        }
        h2 {
            font-size: 26px;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            text-align: left;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            font-weight: 600;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }
        input:focus {
            border-color: #ff9800;
            outline: none;
            box-shadow: 0 0 8px rgba(255, 152, 0, 0.5);
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #e65100, #ff9800);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: linear-gradient(45deg, #bf360c, #e65100);
            transform: scale(1.05);
        }
        .back-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
        }
        .back-link a {
            color: #ff6f00;
            text-decoration: none;
            font-weight: bold;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
        .error-message, .success-message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
            font-weight: bold;
        }
        .error-message {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .success-message {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
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
    <div class="container">
        <h2>Atur Ulang Password</h2>

        @if (session('status'))
            <div class="success-message">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <label>Email:</label>
            <input type="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}" required>

            <label>Password Baru:</label>
            <input type="password" name="password" placeholder="Masukkan Password Baru" required>

            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

            <button type="submit">Ubah Password</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.login') }}">Kembali ke Login</a>
        </div>
    </div>
</body>
</html>
