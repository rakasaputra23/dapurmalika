<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atur Ulang Password - Dapur Malika</title>
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

        /* Animated background pattern */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%, transparent 75%, rgba(255,255,255,0.1) 75%), 
                        linear-gradient(45deg, rgba(255,255,255,0.1) 25%, transparent 25%, transparent 75%, rgba(255,255,255,0.1) 75%);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
            animation: movePattern 20s linear infinite;
            z-index: 0;
        }

        @keyframes movePattern {
            0% { transform: translate(0, 0); }
            100% { transform: translate(60px, 60px); }
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
            animation: rotate 3s linear infinite;
        }

        @keyframes rotate {
            0%, 90%, 100% { transform: rotate(0deg); }
            95% { transform: rotate(5deg); }
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

        .input-wrapper {
            position: relative;
        }

        .input-wrapper::before {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            z-index: 2;
            color: #a0aec0;
        }

        .input-wrapper:nth-of-type(1)::before {
            content: '🔐';
        }

        .input-wrapper:nth-of-type(2)::before {
            content: '🔒';
        }

        input {
            width: 100%;
            padding: 16px 20px 16px 50px;
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

        /* Password strength indicator */
        .password-strength {
            margin-top: 8px;
            display: none;
        }

        .strength-bar {
            height: 4px;
            border-radius: 2px;
            background: #e2e8f0;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .strength-fill {
            height: 100%;
            width: 0;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .strength-text {
            font-size: 12px;
            font-weight: 500;
        }

        .weak { background: #f56565; }
        .medium { background: #ed8936; }
        .strong { background: #48bb78; }

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

        button:disabled {
            background: #cbd5e0;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
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

        .error-message, .success-message {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 12px;
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

        .error-message {
            background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
            color: #742a2a;
            border: 1px solid #fc8181;
            padding-left: 45px;
        }

        .error-message::before {
            content: '⚠️';
            position: absolute;
            left: 15px;
            top: 15px;
            font-size: 16px;
        }

        .success-message {
            background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
            color: #276749;
            border: 1px solid #68d391;
            padding-left: 45px;
        }

        .success-message::before {
            content: '✅';
            position: absolute;
            left: 15px;
            top: 15px;
            font-size: 16px;
        }

        .error-message ul, .success-message ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .error-message li, .success-message li {
            margin-bottom: 5px;
        }

        .error-message li:last-child, .success-message li:last-child {
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

        /* Match indicator */
        .password-match {
            font-size: 12px;
            margin-top: 5px;
            padding: 5px 10px;
            border-radius: 6px;
            font-weight: 500;
            display: none;
        }

        .match { 
            background: #c6f6d5; 
            color: #276749; 
        }

        .no-match { 
            background: #fed7d7; 
            color: #742a2a; 
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
            <div class="header-icon">🔑</div>
            <h2>Atur Ulang Password</h2>
            <p class="subtitle">Buat password baru yang kuat untuk keamanan akun Anda</p>
        </div>

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

        <form method="POST" action="{{ route('admin.password.update') }}" onsubmit="showLoading(this)">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="form-group">
                <label for="password">Password Baru</label>
                <div class="input-wrapper">
                    <input id="password" type="password" name="password" placeholder="Masukkan password baru" required autofocus oninput="checkPasswordStrength(this.value)">
                </div>
                <div class="password-strength" id="passwordStrength">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <div class="strength-text" id="strengthText"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <div class="input-wrapper">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Ulangi password baru" required oninput="checkPasswordMatch()">
                </div>
                <div class="password-match" id="passwordMatch"></div>
            </div>

            <button type="submit" id="saveBtn" disabled>🔒 Simpan Password Baru</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.login') }}">
                <span>←</span>
                <span>Kembali ke Login</span>
            </a>
        </div>
    </div>
    
    <script>
        function checkPasswordStrength(password) {
            const strengthIndicator = document.getElementById('passwordStrength');
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
            if (password.length === 0) {
                strengthIndicator.style.display = 'none';
                return;
            }
            
            strengthIndicator.style.display = 'block';
            
            let strength = 0;
            let feedback = [];
            
            // Length check
            if (password.length >= 8) strength += 25;
            else feedback.push('minimal 8 karakter');
            
            // Uppercase check
            if (/[A-Z]/.test(password)) strength += 25;
            else feedback.push('huruf besar');
            
            // Lowercase check
            if (/[a-z]/.test(password)) strength += 25;
            else feedback.push('huruf kecil');
            
            // Number or special character check
            if (/[0-9]/.test(password) || /[^A-Za-z0-9]/.test(password)) strength += 25;
            else feedback.push('angka/simbol');
            
            strengthFill.style.width = strength + '%';
            
            if (strength < 50) {
                strengthFill.className = 'strength-fill weak';
                strengthText.textContent = 'Lemah - Tambahkan: ' + feedback.join(', ');
                strengthText.style.color = '#f56565';
            } else if (strength < 100) {
                strengthFill.className = 'strength-fill medium';
                strengthText.textContent = 'Sedang - Tambahkan: ' + feedback.join(', ');
                strengthText.style.color = '#ed8936';
            } else {
                strengthFill.className = 'strength-fill strong';
                strengthText.textContent = 'Kuat - Password aman!';
                strengthText.style.color = '#48bb78';
            }
            
            checkPasswordMatch();
        }
        
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchIndicator = document.getElementById('passwordMatch');
            const saveBtn = document.getElementById('saveBtn');
            
            if (confirmPassword.length === 0) {
                matchIndicator.style.display = 'none';
                saveBtn.disabled = true;
                return;
            }
            
            matchIndicator.style.display = 'block';
            
            if (password === confirmPassword && password.length >= 8) {
                matchIndicator.textContent = '✓ Password cocok';
                matchIndicator.className = 'password-match match';
                saveBtn.disabled = false;
            } else {
                matchIndicator.textContent = '✗ Password tidak cocok';
                matchIndicator.className = 'password-match no-match';
                saveBtn.disabled = true;
            }
        }
        
        function showLoading(form) {
            const btn = document.getElementById('saveBtn');
            btn.classList.add('loading');
            btn.disabled = true;
        }
        
        // Auto hide alerts after 7 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.error-message, .success-message');
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