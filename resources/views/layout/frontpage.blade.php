@php
use App\Models\User;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>RakshaAuth | AI Behavioral Authentication for Digital Banking</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/frontpage.css') }}">
</head>
<body>

<div class="bg-animation">
    <div class="bg-blob blob1"></div>
    <div class="bg-blob blob2"></div>
    <div class="bg-blob blob3"></div>
</div>

<div class="main-wrapper">
    <!-- Header with login/register buttons -->
    <div class="navbar">
        <div class="logo-area">
            <div class="logo-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="logo-text">
                <h1>RakshaAuth <span>भारत सरकार</span></h1>
                <div style="font-size: 0.7rem; color:#1e5bbf;">AI Behavioral Trust Layer</div>
            </div>
        </div>
        <div class="auth-buttons">
            <a href="{{ route('login') }}" style="text-decoration: none;" class="btn-login" id="openLoginBtn"><i class="fas fa-arrow-right-to-bracket"></i> Login</a>
            <a href="{{ route('signup') }}" style="text-decoration: none;" class="btn-register" id="openRegisterBtn"><i class="fas fa-user-plus"></i> Register</a>
            
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-left">
            <div class="hero-badge">
                <i class="fas fa-microchip"></i> {{User::count()}} Users Protected
            </div>
            <h2>AI-Driven Behavioral<br>Authentication for Digital Banking</h2>
            <p>Seamless security across <strong>Internet Banking, UPI</strong> & all digital channels. Our AI learns your unique digital behavior — keystrokes, gestures, navigation — to protect against fraud without friction.</p>
            <div class="feature-grid">
                <div class="feature-chip"><i class="fas fa-fingerprint"></i> Behavioral Biometrics</div>
                <div class="feature-chip"><i class="fas fa-brain"></i> Continuous AI Scoring</div>
                <div class="feature-chip"><i class="fas fa-chart-line"></i> Risk-Adaptive</div>
                <div class="feature-chip"><i class="fas fa-laptop-code"></i> Zero-Trust Ready</div>
            </div>
        </div>
        <div class="hero-right">
            <div class="behavior-card">
                <h3><i class="fas fa-robot" style="color:#2b6ef0"></i> Live Intelligence <span class="ai-badge">AI v1.0</span></h3>
                <ul class="metric-list">
                    <li><i class="fas fa-wallet"></i> <span>Behavioral confidence: <strong class="glow-text">98.6%</strong></span></li>
                    <li><i class="fas fa-clock"></i> <span>Real-time anomaly detection: <strong>&lt;90ms</strong></span></li>
                    <li><i class="fas fa-phone-alt"></i> <span> Web unified profile</span></li>
                    <li><i class="fas fa-shield-alt"></i> <span>UPI transaction guard <i class="fas fa-check-circle" style="color:#00a86b"></i></span></li>
                </ul>
                <div style="background: #eef3ff; border-radius: 1rem; padding: 0.8rem; text-align: center; font-size: 0.85rem;">
                    <i class="fas fa-chart-line"></i> Passive authentication • No extra OTP for trusted users
                </div>
            </div>
        </div>
    </div>

    <!-- Digital banking channels -->
    <div class="channels-section">
        <div class="section-title"><i class="fas fa-university"></i> Secure All Channels</div>
        <div class="channel-icons">
            <div class="channel-item"><i class="fas fa-globe"></i> Internet Banking</div>
            <div class="channel-item"><i class="fas fa-qrcode"></i> UPI Platforms</div>
            <div class="channel-item"><i class="fas fa-wallet"></i> Digital Wallets</div>
            <div class="channel-item"><i class="fas fa-desktop"></i> Kiosk Banking</div>
        </div>
        <p style="max-width: 700px; margin: 0 auto; color: #2c5277;">Powered by Ministry of Electronics & IT | NPCI compliant behavioral engine</p>
    </div>

   

    <div class="gov-footer">
        <i class="fas fa-lock"></i> RakshaAuth – AI Behavioral Authentication for Digital India | <i class="fas fa-chart-line"></i> Enhanced Security • Frictionless UX
    </div>
</div>





</body>
</html>