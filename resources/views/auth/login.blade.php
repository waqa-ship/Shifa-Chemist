<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shifa Pharmacy Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a73e8;
            --primary-dark: #0d47a1;
            --secondary: #34a853;
            --accent: #fbbc05;
            --light: #f8f9fa;
            --dark: #202124;
            --gray: #5f6368;
            --gray-light: #dadce0;
            --error: #ea4335;
            --success: #34a853;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --radius: 8px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .login-container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .login-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .login-left::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            top: -50px;
            right: -50px;
        }
        
        .login-left::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            bottom: -30px;
            left: -30px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .logo-icon {
            font-size: 32px;
            margin-right: 12px;
            color: var(--accent);
        }
        
        .logo-text {
            font-size: 24px;
            font-weight: 700;
        }
        
        .welcome-text {
            margin-bottom: 30px;
        }
        
        .welcome-text h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .welcome-text p {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .features {
            margin-top: 30px;
        }
        
        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .login-right {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h2 {
            color: var(--dark);
            font-size: 28px;
            margin-bottom: 8px;
        }
        
        .login-header p {
            color: var(--gray);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: var(--dark);
            font-weight: 500;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid var(--gray-light);
            border-radius: var(--radius);
            font-size: 16px;
            transition: all 0.3s;
        }
        
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .remember {
            display: flex;
            align-items: center;
        }
        
        .remember input {
            margin-right: 8px;
        }
        
        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }
        
        .forgot-password:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .login-button {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .login-button:hover {
            background: var(--primary-dark);
        }
        
        .login-button i {
            margin-left: 8px;
        }
        
        .validation-errors {
            background: rgba(234, 67, 53, 0.1);
            color: var(--error);
            padding: 12px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            border-left: 4px solid var(--error);
        }
        
        .status-message {
            background: rgba(52, 168, 83, 0.1);
            color: var(--success);
            padding: 12px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            border-left: 4px solid var(--success);
        }
        
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }
            
            .login-left {
                padding: 30px;
            }
            
            .login-right {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Branding & Info -->
        <div class="login-left">
            <div class="logo">
                <i class="fas fa-prescription-bottle-alt logo-icon"></i>
                <div class="logo-text">Shifa Pharmacy</div>
            </div>
            
            <div class="welcome-text">
                <h1>Welcome Back</h1>
                <p>Access your pharmacy management dashboard to continue managing medications, inventory, and patient records.</p>
            </div>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <div>
                        <h3>Medicine Management</h3>
                        <p>Track and manage your pharmacy inventory</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div>
                        <h3>Billing & Invoicing</h3>
                        <p>Generate bills and manage transactions</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-user-injured"></i>
                    </div>
                    <div>
                        <h3>Patient Records</h3>
                        <p>Maintain comprehensive patient information</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="login-right">
            <div class="login-header">
                <h2>Sign In</h2>
                <p>Enter your credentials to access your account</p>
            </div>
            
            <!-- Validation Errors -->
            <div class="validation-errors" style="display: none;">
                <strong>Whoops! Something went wrong.</strong>
                <ul>
                    <li>These credentials do not match our records.</li>
                </ul>
            </div>
            
            <!-- Status Message -->
            <div class="status-message" style="display: none;">
                Your password has been reset!
            </div>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    </div>
                </div>
                
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="remember_me" name="remember">
                        <label for="remember_me">Remember me</label>
                    </div>
                    
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        Forgot your password?
                    </a>
                </div>
                
                <button type="submit" class="login-button">
                    Log In <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        // Simple demonstration of validation errors and status messages
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate validation errors (remove this in production)
            setTimeout(function() {
                // Uncomment the line below to show validation errors
                // document.querySelector('.validation-errors').style.display = 'block';
            }, 1000);
            
            // Simulate status message (remove this in production)
            setTimeout(function() {
                // Uncomment the line below to show status message
                // document.querySelector('.status-message').style.display = 'block';
            }, 1500);
        });
    </script>
</body>
</html>-