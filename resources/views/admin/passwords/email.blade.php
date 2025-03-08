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
            background: linear-gradient(135deg, #ff9800, #ff6f00);
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
        }
        h2 {
            font-size: 26px;
            color: #333;
            margin-bottom: 10px;
        }
        p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            text-align: left;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
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
            background: linear-gradient(135deg, #ff9800, #ff6f00);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 8px rgba(255, 152, 0, 0.3);
        }
        button:hover {
            background: linear-gradient(135deg, #e68900, #bf360c);
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
        .alert, .success {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: left;
        }
        .alert {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔒 Reset Password</h2>
        <p>Masukkan email Anda untuk menerima link reset password.</p>

        @if (session('status'))
            <div class="success">
                {!! session('status') !!}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.password.email') }}" method="POST">
            @csrf
            <label>Email:</label>
            <input type="email" name="email" placeholder="Masukkan email Anda" required>
            <button type="submit">🔗 Kirim Link Reset</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.login') }}">⬅ Kembali ke Login</a>
        </div>
    </div>
</body>
</html>
