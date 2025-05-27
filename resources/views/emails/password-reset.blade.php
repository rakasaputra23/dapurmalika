<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Dapur Malika</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        
        .email-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #ff9800;
            padding-bottom: 20px;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 600;
            color: #ff9800;
            margin-bottom: 10px;
        }
        
        .content {
            margin-bottom: 30px;
        }
        
        .content h2 {
            color: #333;
            margin-bottom: 20px;
        }
        
        .content p {
            margin-bottom: 15px;
            color: #666;
        }
        
        .reset-button {
            display: inline-block;
            background: linear-gradient(135deg, #ff9800, #e65100);
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin: 20px 0;
            transition: transform 0.3s ease;
        }
        
        .reset-button:hover {
            transform: scale(1.05);
        }
        
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        
        .footer {
            border-top: 1px solid #eee;
            padding-top: 20px;
            margin-top: 30px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
        
        .warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .expiry-info {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
            color: #1565c0;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">🍳 Dapur Malika</div>
            <p>Sistem Administrasi</p>
        </div>
        
        <div class="content">
            <h2>🔐 Reset Password</h2>
            <p>Halo,</p>
            <p>Kami menerima permintaan untuk mereset password akun admin Anda dengan email: <strong>{{ $email }}</strong></p>
            <p>Untuk melanjutkan proses reset password, silakan klik tombol di bawah ini:</p>
            
            <div class="button-container">
                <a href="{{ $url }}" class="reset-button">🔗 Reset Password Sekarang</a>
            </div>
            
            <div class="expiry-info">
                <strong>⏰ Penting:</strong> Link reset password ini akan kedaluwarsa dalam <strong>{{ $count }} menit</strong> dari waktu email ini dikirim.
            </div>
            
            <div class="warning">
                <strong>⚠️ Perhatian:</strong> Jika Anda tidak meminta reset password ini, harap abaikan email ini. Akun Anda tetap aman dan tidak ada perubahan yang akan dilakukan.
            </div>
            
            <p>Jika tombol di atas tidak berfungsi, Anda dapat menyalin dan menempelkan URL berikut ke browser Anda:</p>
            <p style="word-break: break-all; background: #f8f9fa; padding: 10px; border-radius: 5px; font-family: monospace; font-size: 12px;">{{ $url }}</p>
        </div>
        
        <div class="footer">
            <p>Email ini dikirim secara otomatis dari sistem Dapur Malika.</p>
            <p>Jika Anda memiliki pertanyaan, silakan hubungi administrator sistem.</p>
            <p>&copy; {{ date('Y') }} Dapur Malika. All rights reserved.</p>
        </div>
    </div>
</body>
</html>