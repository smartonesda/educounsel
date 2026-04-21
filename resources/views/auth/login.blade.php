<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EduCounsel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* Left Side - Purple Background 60% */
        .login-left {
            flex: 0 0 60%;
            background: linear-gradient(180deg, #5B21B6 0%, #7C3AED 50%, #8B5CF6 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Decorative Shapes */
        .shape-top-left {
            position: absolute;
            top: -20px;
            left: -20px;
            width: 150px;
            height: 150px;
            opacity: 0.4;
            transform: rotate(-15deg);
        }

        .shape-bottom-right {
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 220px;
            height: 220px;
            opacity: 0.4;
            transform: rotate(25deg);
        }

        /* Logo Container with White Card */
        .logo-container {
            position: absolute;
            top: 28px;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 10px 24px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .logo-img {
            height: 32px;
            width: auto;
        }

        /* Illustration Container */
        .illustration-wrapper {
            position: relative;
            margin-top: 40px;
            z-index: 5;
        }

        .illustration-bg {
            width: 400px;
            height: 400px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .illustration-img {
            width: 340px;
            height: auto;
            object-fit: contain;
        }

        /* Welcome Text */
        .welcome-box {
            margin-top: 50px;
            text-align: center;
            z-index: 5;
        }

        .welcome-box h2 {
            font-size: 26px;
            font-weight: 600;
            color: white;
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }

        .welcome-box p {
            font-size: 15px;
            font-weight: 400;
            color: rgba(255, 255, 255, 0.95);
            letter-spacing: 0.2px;
        }

        /* Right Side - Login Form 40% */
        .login-right {
            flex: 0 0 40%;
            background: #F5F5F5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 40px;
        }

        .login-form-container {
            width: 100%;
            max-width: 440px;
            background: white;
            padding: 48px 42px;
            border-radius: 20px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.08);
        }

        .form-header {
            text-align: center;
            margin-bottom: 36px;
        }

        .form-header h1 {
            font-size: 26px;
            font-weight: 700;
            color: #1A1A1A;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .form-header p {
            font-size: 15px;
            font-weight: 400;
            color: #666666;
            letter-spacing: 0.1px;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 22px;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #ADADAD;
            font-size: 17px;
        }

        .form-input {
            width: 100%;
            padding: 16px 18px 16px 50px;
            border: 1.5px solid #E0E0E0;
            border-radius: 10px;
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
            color: #333333;
            background: #FFFFFF;
            transition: all 0.3s ease;
        }

        .form-input::placeholder {
            color: #ADADAD;
        }

        .form-input:focus {
            outline: none;
            border-color: #7C3AED;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.1);
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #ADADAD;
            cursor: pointer;
            font-size: 17px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #666666;
        }

        /* Forgot Password Link */
        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            font-size: 14px;
            color: #7C3AED;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #5B21B6;
            text-decoration: underline;
        }

        /* Login Button */
        .btn-login {
            width: 100%;
            padding: 16px 0;
            background: #7C3AED;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Roboto', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 28px;
            letter-spacing: 0.3px;
        }

        .btn-login:hover {
            background: #6D28D9;
            box-shadow: 0 6px 20px rgba(124, 58, 237, 0.4);
            transform: translateY(-2px);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 26px 0;
            color: #999999;
            font-size: 14px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #E0E0E0;
        }

        .divider::before {
            margin-right: 18px;
        }

        .divider::after {
            margin-left: 18px;
        }

        /* Google Button */
        .btn-google {
            width: 100%;
            padding: 14px 0;
            background: white;
            border: 1.8px solid #E0E0E0;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            color: #333333;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .btn-google:hover {
            border-color: #7C3AED;
            box-shadow: 0 4px 16px rgba(124, 58, 237, 0.15);
        }

        .google-icon {
            width: 22px;
            height: 22px;
        }

        /* Register Section */
        .register-section {
            margin-top: 26px;
            text-align: center;
        }

        .register-text {
            font-size: 14px;
            color: #666666;
            margin-bottom: 14px;
        }

        .btn-register {
            width: 100%;
            padding: 14px 0;
            background: white;
            border: 1.8px solid #7C3AED;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            color: #7C3AED;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: #F3E8FF;
            border-color: #6D28D9;
            color: #6D28D9;
        }

        /* Alert Messages */
        .alert {
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-danger {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            color: #DC2626;
        }

        .alert-success {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #16A34A;
        }

        .alert i {
            font-size: 17px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .login-left {
                flex: 0 0 50%;
            }

            .login-right {
                flex: 0 0 50%;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .login-left {
                display: none;
            }

            .login-right {
                flex: 1;
            }

            .login-form-container {
                padding: 36px 28px;
            }
        }

        @media (max-width: 480px) {
            .login-form-container {
                padding: 30px 22px;
            }

            .form-header h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <!-- Left Side - Purple Background 60% -->
    <div class="login-left">
        <!-- Decorative Shapes -->
        <img src="{{ asset('images/components/Rectangle 1622.png') }}" alt="" class="shape-top-left">
        <img src="{{ asset('images/components/Rectangle 1625.png') }}" alt="" class="shape-bottom-right">
        
        <!-- Logo with Card Background - Only Image -->
        <div class="logo-container">
            <img src="{{ asset('images/v2.svg') }}" alt="EduCounsel Logo" class="logo-img">
        </div>

        <!-- Illustration -->
        <div class="illustration-wrapper">
            <div class="illustration-bg">
                <img src="{{ asset('images/konseling.png') }}" alt="Konseling Illustration" class="illustration-img">
            </div>
        </div>

        <!-- Welcome Text -->
        <div class="welcome-box">
            <h2>Selamat Datang Di EduCounsel</h2>
            <p>Website Bimbingan Konseling Sekolah</p>
        </div>
    </div>

    <!-- Right Side - Login Form 40% -->
    <div class="login-right">
        <div class="login-form-container">
            <!-- Form Header -->
            <div class="form-header">
                <h1>Halo, Selamat Datang Kembali</h1>
                <p>Masuk ke akun anda</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div>{{ session('status') }}</div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Input -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input 
                            type="email" 
                            name="email" 
                            class="form-input" 
                            placeholder="Email"
                            value="{{ old('email') }}"
                            required 
                            autofocus
                        >
                    </div>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-input" 
                            placeholder="Password"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">Lupa Password?</a>
                    </div>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn-login">
                    Log In
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">Atau</div>

            <!-- Google Login Button -->
            <button type="button" class="btn-google" onclick="alert('Fitur Google Login sedang dalam pengembangan')">
                <svg class="google-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Google
            </button>

            <!-- Register Section -->
            <div class="register-section">
                <p class="register-text">Belum punya akun?</p>
                <button type="button" class="btn-register" onclick="window.location.href='{{ route('register') }}'">
                    Registrasi
                </button>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
