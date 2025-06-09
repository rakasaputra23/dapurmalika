<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login - Dapur Malika</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        * {
            margin: 0; padding: 0; box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        /* Animated background particles */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            animation: float 20s infinite linear;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            100% { transform: translateY(-100px); }
        }
        
        .login-container {
            display: flex;
            width: 900px;
            max-width: 90vw;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            animation: slideIn 0.8s ease-out;
            position: relative;
            z-index: 1;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .login-image {
            width: 50%;
            background: linear-gradient(45deg, rgba(255, 111, 0, 0.8), rgba(230, 81, 0, 0.8)), 
                        url('/images/login-bg.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            text-align: center;
            padding: 40px;
        }
        
        .login-image h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .login-image p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .login-form {
            width: 50%;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }
        
        .form-header h2 {
            font-size: 2rem;
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .form-header p {
            color: #718096;
            font-size: 0.9rem;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #4a5568;
            font-size: 0.9rem;
        }
        
        input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f7fafc;
        }
        
        input:focus {
            border-color: #ff6f00;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 111, 0, 0.1);
            background: white;
            transform: translateY(-1px);
        }
        
        input::placeholder {
            color: #a0aec0;
        }
        
        button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #ff6f00 0%, #e65100 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        button:hover::before {
            left: 100%;
        }
        
        button:hover {
            background: linear-gradient(135deg, #e65100 0%, #bf360c 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 111, 0, 0.3);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }
        
        .login-footer a {
            color: #ff6f00;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .login-footer a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -3px;
            left: 50%;
            background-color: #ff6f00;
            transition: all 0.3s ease;
        }
        
        .login-footer a:hover::after {
            width: 100%;
            left: 0;
        }
        
        .login-footer a:hover {
            color: #e65100;
        }
        
        .alert {
            width: 100%;
            padding: 15px 20px;
            background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
            color: #742a2a;
            border: 1px solid #fc8181;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            animation: shake 0.5s ease-in-out;
            position: relative;
            overflow: hidden;
        }
        
        .alert::before {
            content: '⚠️';
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
        }
        
        .alert {
            padding-left: 45px;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        
        .success-alert {
            background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
            color: #276749;
            border-color: #68d391;
        }
        
        .success-alert::before {
            content: '✅';
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                width: 95vw;
                max-width: 400px;
            }
            
            .login-image {
                width: 100%;
                min-height: 200px;
            }
            
            .login-form {
                width: 100%;
                padding: 30px 25px;
            }
            
            .login-image h1 {
                font-size: 2rem;
            }
        }
        
        /* Loading animation for button */
        .loading {
            position: relative;
            color: transparent;
        }
        
        .loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <h1>Dapur Malika</h1>
            <p>Selamat datang kembali! Silakan masuk ke panel admin untuk mengelola sistem.</p>
        </div>

        <div class="login-form">
            <div class="form-header">
                <h2>Login Admin</h2>
                <p>Masukkan kredensial Anda untuk melanjutkan</p>
            </div>
            
            @if(session('error'))
                <div class="alert">{{ session('error') }}</div>
            @endif
            
            @if($errors->has('email'))
                <div class="alert">Email yang Anda masukkan tidak valid atau tidak terdaftar.</div>
            @endif
            
            @if($errors->has('password'))
                <div class="alert">Password yang Anda masukkan salah. Silakan coba lagi.</div>
            @endif
            
            @if(session('success'))
                <div class="alert success-alert">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" onsubmit="showLoading(this)">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required autofocus value="{{ old('email') }}">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                </div>
                
                <button type="submit" id="loginBtn">Masuk ke Dashboard</button>
            </form>

            <div class="login-footer">
                <p><a href="{{ route('admin.password.request') }}">Lupa Password?</a></p>
            </div>
        </div>
    </div>
    
    <script>
        function showLoading(form) {
            const btn = document.getElementById('loginBtn');
            btn.classList.add('loading');
            btn.disabled = true;
            setTimeout(() => {
                if (btn.classList.contains('loading')) {
                    btn.classList.remove('loading');
                    btn.disabled = false;
                }
            }, 5000);
        }
        
        // Auto hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-10px)';
                    setTimeout(() => alert.remove(), 300);
                }, 5000);
            });
        });
    </script>
</body>
</html>