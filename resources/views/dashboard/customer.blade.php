<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>RakshaAuth Dashboard | AI Behavioral Banking</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/customer_dashboard.css') }}">
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- LEFT SIDEBAR DYNAMIC -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="logo-area">
                    <div class="logo-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="logo-text">
                        <h3>RakshaAuth</h3>
                        <p>Govt of India</p>
                    </div>
                </div>
            </div>
            <div class="sidebar-nav">
                <div class="nav-item active" data-section="dashboard">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </div>
                <div class="nav-item" data-section="transactions">
                    <i class="fas fa-exchange-alt"></i> <span>Transactions</span>
                </div>
                <div class="nav-item" data-section="upi">
                    <i class="fas fa-qrcode"></i> <span>UPI Payments</span>
                </div>
                <div class="nav-item" data-section="transfer">
                    <i class="fas fa-money-bill-wave"></i> <span>Transfer Money</span>
                </div>
                <div class="nav-item" data-section="security">
                    <i class="fas fa-shield-virus"></i> <span>Security Logs</span>
                </div>
                <div class="nav-item" data-section="profile">
                    <i class="fas fa-user-circle"></i> <span>Profile</span>
                </div>
                <div class="nav-item" data-section="settings">
                    <i class="fas fa-cog"></i> <span>Settings</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf

                    <button type="submit" class="nav-item logout-item logout-btn">

                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>

                    </button>
                </form>

            </div>
        </div>

        <!-- MAIN CONTENT AREA -->
        <div class="main-content">
            <!-- Welcome top bar -->
            <div class="top-welcome">
                <div class="welcome-text">
                    <h2>Welcome, {{ Auth::user()->name }} <i class="fas fa-hand-peace"></i></h2>
                    <p><i class="fas fa-shield-alt"></i> Secure Banking Access Active · AI Behavioral Authentication Online</p>
                </div>
                <div class="badge-status">
                    <i class="fas fa-fingerprint"></i> Trust Score: 98.6%
                </div>
            </div>

            <!-- DASHBOARD SECTION (default visible) -->
            <div id="dashboardSection">
                <!-- 4 Cards -->
                <div class="cards-grid">
                    <!-- Card 1 - Account Balance -->
                    <div class="dashboard-card">
                        <div class="card-header">
                            <span>Account Balance</span>
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="card-value">₹ 45,230</div>
                        <div class="card-sub">Savings Account • SBIN001234</div>
                    </div>
                    <!-- Card 2 - Last Login -->
                    <div class="dashboard-card">
                        <div class="card-header">
                            <span>Last Login</span>
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="card-value" style="font-size: 1.2rem;">{{ Auth::user()->last_login_at ? Auth::user()->last_login_at->format('d M Y') : 'Never' }}</div>
                        <div class="card-sub">live</div>
                    </div>
                    <!-- Card 3 - Security Status -->
                    <div class="dashboard-card">
                        <div class="card-header">
                            <span>Security Status</span>
                            <i class="fas fa-shield-haltered"></i>
                        </div>
                        <div class="security-badge"><i class="fas fa-check-circle"></i> Account Secure ✅</div>
                        <div class="card-sub" style="margin-top: 8px;">No suspicious activity detected</div>
                    </div>
                    <!-- Card 4 - Behavioral Trust -->
                    <div class="dashboard-card">
                        <div class="card-header">
                            <span>AI Trust Indicator</span>
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="card-value" style="font-size: 1.5rem;">Active Session</div>
                        <div class="card-sub">Behavioral profile: Low risk</div>
                    </div>
                </div>

                <!-- Quick Actions Panel -->
                <div class="quick-actions">
                    <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
                    <div class="action-buttons">
                        <div class="action-btn" data-quick="transfer"><i class="fas fa-arrow-up"></i> Send Money</div>
                        <div class="action-btn" data-quick="upi"><i class="fas fa-mobile-alt"></i> UPI Payment</div>
                        <div class="action-btn" data-quick="statement"><i class="fas fa-download"></i> Download Statement</div>
                        <div class="action-btn" data-quick="security"><i class="fas fa-history"></i> Security Logs</div>
                    </div>
                </div>
            </div>

            <!-- DYNAMIC SECTIONS (hidden by default) -->
            <div id="transactionsSection" class="section-placeholder">
                <div class="placeholder-title"><i class="fas fa-exchange-alt"></i> Recent Transactions</div>
                <p style="color:#4a627a;">✅ 12 May 2026 - UPI Payment to Grocery Store: ₹850</p>
                <p style="color:#4a627a;">✅ 10 May 2026 - Transfer to Savings X: ₹5,000</p>
                <p style="color:#4a627a;">✅ 08 May 2026 - Bill Payment: ₹1,200</p>
                <p style="margin-top:1rem; font-size:0.8rem; color:#8ba0bc;"><i class="fas fa-shield-alt"></i> All transactions verified by behavioral AI.</p>
            </div>
            <div id="upiSection" class="section-placeholder">
                <div class="placeholder-title"><i class="fas fa-qrcode"></i> UPI Payments Hub</div>
                <p style="background:#f7f9fc; padding:1rem; border-radius: 1rem;">📱 Scan QR or Pay to VPA: rahul@okhdfcbank</p>
                <div class="action-btn" style="margin-top:0.8rem;" id="simulateUpiPay"><i class="fas fa-rupee-sign"></i> Simulate UPI Payment</div>
            </div>
            <div id="transferSection" class="section-placeholder">
                <div class="placeholder-title"><i class="fas fa-money-bill-wave"></i> Transfer Money (IMPS / NEFT)</div>
                <p>💸 Beneficiary: Add account or choose saved payees. AI behavioral check ensures safe transfer.</p>
                <div class="action-btn" id="simulateTransfer" style="margin-top:0.8rem;">Proceed to Transfer</div>
            </div>
            <div id="securitySection" class="section-placeholder">
                <div class="placeholder-title"><i class="fas fa-shield-virus"></i> Security Logs & Events</div>
                <p>🔒 14 May 2026 10:30 AM - Login from Delhi (Trusted Device)</p>
                <p>🔒 13 May 2026 08:15 PM - UPI transaction authorized (Behavioral match)</p>
                <p>🔒 12 May 2026 - AI anomaly score: 2% (Normal)</p>
                <p><i class="fas fa-check-circle" style="color:#1e6f5c;"></i> No unauthorized access attempts.</p>
            </div>
            <div id="profileSection" class="section-placeholder">
                <div class="placeholder-title"><i class="fas fa-user-circle"></i> Profile Information</div>
                <p><strong>Name:</strong> Rahul Sharma</p>
                <p><strong>Registered Mobile:</strong> +91 98765 43210</p>
                <p><strong>Email:</strong> rahul.sharma@gov.in</p>
                <p><strong>Aadhaar Linked:</strong> Yes (Secured via AI vault)</p>
            </div>
            <div id="settingsSection" class="section-placeholder">
                <div class="placeholder-title"><i class="fas fa-cog"></i> Security & Preferences</div>
                <p>🔹 Behavioral authentication: ON</p>
                <p>🔹 Two-factor with OTP + AI: Enabled</p>
                <p>🔹 Notification preferences: Email & SMS</p>
                <div class="action-btn">Manage Security Settings</div>
            </div>
        </div>
    </div>

    <!-- Toast notification -->
    <div id="actionToast" style="position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%) translateY(100px); background: #1e2f3ad9; backdrop-filter: blur(12px); color: white; padding: 0.6rem 1.5rem; border-radius: 60px; font-size: 0.85rem; font-weight: 500; z-index: 2000; transition: transform 0.25s ease; pointer-events: none; display: flex; align-items: center; gap: 8px; font-family: monospace;">
        <i class="fas fa-shield-alt"></i> <span id="toastMsg">Ready</span>
    </div>


</body>
</html>
