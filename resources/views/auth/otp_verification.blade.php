<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>RakshaAuth | OTP Verification · AI Behavioral Authentication</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/otp.css') }}">
</head>
<body>
    <div class="auth-container">
        <!-- LEFT SIDE: OTP Verification Form (Email OTP + Phone OTP) -->
        <div class="form-side">
            <div class="form-header">
                <h2><i class="fas fa-shield-alt"></i> OTP Verification</h2>
                <div class="verification-subtitle">
                    <i class="fas fa-fingerprint"></i> Two-factor authentication · AI behavioral binding
                </div>
            </div>
            @if (session('error'))
            <div class="error-message">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            </div>
            @endif

            @if (session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
            @endif

            <div class="auth-form">
                <form id="otpVerificationForm" method="POST" action="{{ route('otp_verification.submit') }}">
                    @csrf
                    <!-- Email OTP Field -->
                    <div class="otp-row">
                        <div class="otp-field">
                            <label><i class="fas fa-envelope"></i> Email OTP</label>
                            <div class="otp-input-wrapper">
                                <input type="text" id="emailOtp" placeholder="6-digit OTP" maxlength="6" autocomplete="off" pattern="[0-9]{6}" inputmode="numeric" name="otp" required>
                            </div>
                        </div>
                        <!-- Phone OTP Field -->

                    </div>

                    <!-- Verify Button -->
                    <button type="submit" class="verify-btn"><i class="fas fa-check-circle"></i> Verify & Continue</button>
                </form>
                <!-- Resend OTP Section with Timer -->
                
                <div class="resend-section">
                    <form id="resendOtpForm" method="POST" action="{{ route('resend_otp') }}">
                        @csrf
                        <button type="submit" class="resend-btn" id="resendOtpBtn"><i class="fas fa-sync-alt"></i> Resend OTP</button>
                    </form>

                </div>

                <div class="form-footer-note">
                    <i class="fas fa-shield-alt"></i> OTPs are sent to your registered email and mobile number. Both are required for government-grade verification.
                </div>
                <div class="demo-hint">
                    <i class="fas fa-info-circle"></i> Demo OTP: 123456 (email) 
                </div>
                <div class="back-link">
                    <a href="{{ route('login') }}" id="backToLoginLink"><i class="fas fa-arrow-left"></i> Back to Login</a>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE: RakshaAuth Branding (same consistent design) -->
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
                    <li><i class="fas fa-chart-simple"></i> Passive behavioral intelligence</li>
                    <li><i class="fas fa-mobile-alt"></i> Covers UPI, Mobile, Internet Banking</li>
                    <li><i class="fas fa-shield-haltered"></i> Zero-Trust digital identity</li>
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

    <!-- Toast notification -->
    <div id="actionToast" class="action-toast">
        <i class="fas fa-shield-alt"></i> <span id="toastMsg">Ready</span>
    </div>


</body>
</html>
