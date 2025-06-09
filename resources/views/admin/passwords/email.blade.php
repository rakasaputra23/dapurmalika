<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reset Password - Dapur Malika</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            position: relative;
            overflow: hidden;
        }
        
        /* Animated background elements */
        body::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: rotate 20s linear infinite;
            z-index: 0;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 45px 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 1;
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .header {
            text-align: center;
            margin-bottom: 35px;
        }
        
        .header-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff6f00 0%, #e65100 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(255, 111, 0, 0.3);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        h2 {
            font-size: 1.8rem;
            color: #2d3748;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .subtitle {
            color: #718096;
            font-size: 0.95rem;
            line-height: 1.5;
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
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f7fafc;
            position: relative;
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
        
        /* Input icon */
        .input-wrapper {
            position: relative;
        }
        
        .input-wrapper::before {
            content: '📧';
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            z-index: 2;
        }
        
        .input-wrapper input {
            padding-left: 50px;
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
        
        .back-link {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e2e8f0;
        }
        
        .back-link a {
            color: #ff6f00;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .back-link a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -3px;
            left: 50%;
            background-color: #ff6f00;
            transition: all 0.3s ease;
        }
        
        .back-link a:hover::after {
            width: 100%;
            left: 0;
        }
        
        .back-link a:hover {
            color: #e65100;
            transform: translateX(-3px);
        }
        
        .alert, .success {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            position: relative;
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .alert {
            background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
            color: #742a2a;
            border: 1px solid #fc8181;
        }
        
        .alert::before {
            content: '⚠️';
            position: absolute;
            left: 15px;
            top: 15px;
            font-size: 16px;
        }
        
        .success {
            background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
            color: #276749;
            border: 1px solid #68d391;
        }
        
        .success::before {
            content: '✅';
            position: absolute;
            left: 15px;
            top: 15px;
            font-size: 16px;
        }
        
        .alert, .success {
            padding-left: 45px;
        }
        
        .alert ul, .success ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .alert li, .success li {
            margin-bottom: 5px;
        }
        
        .alert li:last-child, .success li:last-child {
            margin-bottom: 0;
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
        
        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                margin: 20px;
                padding: 35px 25px;
                max-width: calc(100vw - 40px);
            }
            
            .header-icon {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }
            
            h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-icon">🔒</div>
            <h2>Reset Password</h2>
            <p class="subtitle">Masukkan email Anda untuk menerima link reset password yang aman</p>
        </div>

        @if (session('status'))
            <div class="success">{{ session('status') }}</div>
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

        <form action="{{ route('admin.password.email') }}" method="POST" onsubmit="showLoading(this)">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" placeholder="Masukkan alamat email Anda" required autofocus value="{{ old('email') }}">
                </div>
            </div>
            
            <button type="submit" id="resetBtn">🔗 Kirim Link Reset Password</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.login') }}">
                <span>←</span>
                <span>Kembali ke Login</span>
            </a>
        </div>
    </div>
    
    <script>
        function showLoading(form) {
            const btn = document.getElementById('resetBtn');
            btn.classList.add('loading');
            btn.disabled = true;
            setTimeout(() => {
                if (btn.classList.contains('loading')) {
                    btn.classList.remove('loading');
                    btn.disabled = false;
                }
            }, 10000);
        }
        
        // Auto hide alerts after 7 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert, .success');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateX(-20px)';
                    setTimeout(() => alert.remove(), 300);
                }, 7000);
            });
        });
    </script>
</body>
</html>