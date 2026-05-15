<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>RakshaAuth | Government Login · AI Behavioral Authentication</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="auth-container">
        <!-- LEFT SIDE: Login Form (Name/Mobile, Password, Remember Me, Login Button) -->
        <div class="form-side">
            <div class="form-header">
                <h2><i class="fas fa-shield-alt"></i> RakshaAuth Login</h2>
                <div class="login-subtitle">
                    <i class="fas fa-fingerprint"></i> AI-driven behavioral authentication · Government-grade security
                </div>
            </div>

            <div class="auth-form">
                <form action="{{ route('login.submit') }}" method="POST" id="loginForm">
                    @csrf
                    <!-- Name / Mobile input -->
                    <div class="input-group">
                        <label><i class="fas fa-id-card"></i> Name / Mobile Number</label>
                        <input type="text" id="loginIdentifier" placeholder="Enter registered name or 10-digit mobile" required autocomplete="username" name="email">
                    </div>
                    <!-- Password input -->
                    <div class="input-group">
                        <label><i class="fas fa-lock"></i> Password</label>
                        <input type="password" id="loginPassword" placeholder="••••••••" required autocomplete="current-password" name="password">
                    </div>
                    <!-- Remember Me + Forgot Password row -->
                    <div class="flex-options">
                        <label class="remember-check">
                            <input type="checkbox" id="rememberMeCheckbox"> <span>Remember me</span>
                        </label>

                    </div>
                    <!-- Login Button -->
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-arrow-right-to-bracket"></i> Login & Authenticate
                    </button>
                    <div class="form-footer-note">
                        <i class="fas fa-chart-line"></i> Continuous behavioral AI analyzes keystroke dynamics, navigation patterns & device trust.
                    </div>
                    <div class="signup-redirect">
                        New to RakshaAuth? <a href="{{ route('signup') }}" id="signupRedirectLink">Create an account</a> (Govt verified signup)
                    </div>
                </form>
            </div>
        </div>

        <!-- RIGHT SIDE: RakshaAuth Branding with government elegance -->
        <div class="brand-side">
            <div class="brand-content">
                <div class="gov-emblem">
                    <i class="fas fa-gem"></i>
                </div>
                <h1>RakshaAuth</h1>
                <div class="brand-tagline">
                    भारत सरकार · Ministry of Electronics & IT<br>
                    AI Behavioral Authentication for Digital Banking
                </div>
                <ul class="ai-feature-list">
                    <li><i class="fas fa-brain"></i> Passive behavioral intelligence</li>
                    <li><i class="fas fa-mobile-alt"></i> Covers UPI, Mobile, Internet Banking</li>
                    <li><i class="fas fa-shield-alt"></i> Zero-Trust digital identity</li>
                    <li><i class="fas fa-clock"></i> Real-time anomaly detection</li>
                </ul>
                <div class="certification">
                    <i class="fas fa-check-circle"></i> NPCI & MeitY compliant
                </div>
                <div class="gov-footer-text">
                    <i class="fas fa-laptop-code"></i> Secure • Frictionless • Government-grade
                </div>
            </div>
        </div>
    </div>

    <!-- Toast notification for feedback -->
    <div id="actionToast" class="action-toast">
        <i class="fas fa-shield-alt"></i> <span id="toastMsg">Ready</span>
    </div>


</body>
</html>
