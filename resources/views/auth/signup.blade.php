<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>RakshaAuth | Government Sign-Up · AI Behavioral Authentication</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
    <div class="auth-container">
        <!-- LEFT SIDE: dynamic signup / login form -->
        <div class="form-side">
            <div class="form-header">
                <h2><i class="fas fa-shield-alt"></i> Digital Identity Access</h2>
                <div class="toggle-buttons">
                    <button class="toggle-btn" id="signupTabBtn">Register (Sign Up)</button>
                    <a href="{{ route('login') }}" style="text-decoration: none;" class="toggle-btn" id="loginTabBtn">Login</a>
                </div>
            </div>

            <!-- Sign Up Form (default visible) -->
            <div id="signupFormContainer" class="auth-form">
                <form id="signupForm" action="{{ route('signup.submit') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label><i class="far fa-user"></i> Full Name (as per Govt ID)</label>
                        <input type="text" id="signupName" placeholder="e.g., Ananya Verma" name="name" required>
                    </div>
                    <div class="input-group">
                        <label><i class="far fa-envelope"></i> Email</label>
                        <input type="email" id="signupEmail" placeholder="user@gov.in/user@gmail.com" name="email" required>
                    </div>
                    <div class="input-group">
                        <label><i class="fas fa-mobile-alt"></i> Mobile Number</label>
                        <input type="text" id="signupMobile" placeholder="10-digit mobile number" name="mobile" required>
                    </div>
                    <div class="input-group">
                        <label><i class="fas fa-university"></i> Bank Branch</label>
                        <select id="signupBranch" name="branch" required>
                            <option value="">Select Branch</option>
                            <option value="delhi-newdelhi">New Delhi</option>
                            <option value="delhi-northdelhi">North Delhi</option>
                            <option value="delhi-southdelhi">South Delhi</option>
                            <option value="delhi-eastdelhi">East Delhi</option>
                            <option value="delhi-westdelhi">West Delhi</option>

                            <option value="maharashtra-mumbai">Mumbai</option>
                            <option value="maharashtra-pune">Pune</option>
                            <option value="maharashtra-nagpur">Nagpur</option>
                            <option value="maharashtra-thane">Thane</option>
                            <option value="maharashtra-nashik">Nashik</option>

                            <option value="uttarpradesh-lucknow">Lucknow</option>
                            <option value="uttarpradesh-kanpur">Kanpur</option>
                            <option value="uttarpradesh-varanasi">Varanasi</option>
                            <option value="uttarpradesh-agra">Agra</option>
                            <option value="uttarpradesh-noida">Noida</option>

                            <option value="gujarat-ahmedabad">Ahmedabad</option>
                            <option value="gujarat-surat">Surat</option>
                            <option value="gujarat-vadodara">Vadodara</option>
                            <option value="gujarat-rajkot">Rajkot</option>
                            <option value="gujarat-gandhinagar">Gandhinagar</option>

                            <option value="rajasthan-jaipur">Jaipur</option>
                            <option value="rajasthan-jodhpur">Jodhpur</option>
                            <option value="rajasthan-udaipur">Udaipur</option>
                            <option value="rajasthan-kota">Kota</option>
                            <option value="rajasthan-ajmer">Ajmer</option>

                            <option value="punjab-ludhiana">Ludhiana</option>
                            <option value="punjab-amritsar">Amritsar</option>
                            <option value="punjab-jalandhar">Jalandhar</option>
                            <option value="punjab-patiala">Patiala</option>
                            <option value="punjab-bathinda">Bathinda</option>

                            <option value="haryana-gurugram">Gurugram</option>
                            <option value="haryana-faridabad">Faridabad</option>
                            <option value="haryana-panipat">Panipat</option>
                            <option value="haryana-karnal">Karnal</option>
                            <option value="haryana-hisar">Hisar</option>

                            <option value="bihar-patna">Patna</option>
                            <option value="bihar-gaya">Gaya</option>
                            <option value="bihar-muzaffarpur">Muzaffarpur</option>
                            <option value="bihar-bhagalpur">Bhagalpur</option>
                            <option value="bihar-darbhanga">Darbhanga</option>

                            <option value="westbengal-kolkata">Kolkata</option>
                            <option value="westbengal-howrah">Howrah</option>
                            <option value="westbengal-darjeeling">Darjeeling</option>
                            <option value="westbengal-siliguri">Siliguri</option>
                            <option value="westbengal-durgapur">Durgapur</option>

                            <option value="karnataka-bengaluru">Bengaluru</option>
                            <option value="karnataka-mysuru">Mysuru</option>
                            <option value="karnataka-mangaluru">Mangaluru</option>
                            <option value="karnataka-hubli">Hubli</option>
                            <option value="karnataka-belagavi">Belagavi</option>

                            <option value="tamilnadu-chennai">Chennai</option>
                            <option value="tamilnadu-coimbatore">Coimbatore</option>
                            <option value="tamilnadu-madurai">Madurai</option>
                            <option value="tamilnadu-salem">Salem</option>
                            <option value="tamilnadu-tiruchirappalli">Tiruchirappalli</option>

                            <option value="kerala-kochi">Kochi</option>
                            <option value="kerala-thiruvananthapuram">Thiruvananthapuram</option>
                            <option value="kerala-kozhikode">Kozhikode</option>
                            <option value="kerala-thrissur">Thrissur</option>
                            <option value="kerala-kollam">Kollam</option>

                            <option value="madhyapradesh-bhopal">Bhopal</option>
                            <option value="madhyapradesh-indore">Indore</option>
                            <option value="madhyapradesh-jabalpur">Jabalpur</option>
                            <option value="madhyapradesh-gwalior">Gwalior</option>
                            <option value="madhyapradesh-ujjain">Ujjain</option>

                            <option value="odisha-bhubaneswar">Bhubaneswar</option>
                            <option value="odisha-cuttack">Cuttack</option>
                            <option value="odisha-rourkela">Rourkela</option>
                            <option value="odisha-puri">Puri</option>
                            <option value="odisha-sambalpur">Sambalpur</option>

                            <option value="assam-guwahati">Guwahati</option>
                            <option value="assam-dibrugarh">Dibrugarh</option>
                            <option value="assam-silchar">Silchar</option>
                            <option value="assam-jorhat">Jorhat</option>
                            <option value="assam-tezpur">Tezpur</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label><i class="fas fa-lock"></i> Create Password</label>
                        <input type="password" id="signupPass" placeholder="min. 6 characters" name="password" required>
                    </div>
                    <div class="input-group">
                        <label><i class="fas fa-fingerprint"></i> Confirm Password</label>
                        <input type="password" id="signupConfirmPass" placeholder="retype password" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="submit-btn"><i class="fas fa-user-plus"></i> Register & Verify OTP</button>
                    <div class="form-footer-note">
                        <i class="fas fa-chart-line"></i> By registering, you consent to AI-driven behavioral authentication across all banking channels.
                    </div>
                </form>
            </div>

            <!-- Login Form (initially hidden) -->
            <div id="loginFormContainer" class="auth-form hidden-form">
                <form id="loginForm">
                    <div class="input-group">
                        <label><i class="fas fa-id-card"></i> User ID / Aadhaar-linked ID</label>
                        <input type="text" id="loginUsername" placeholder="Enter registered ID" required>
                    </div>
                    <div class="input-group">
                        <label><i class="fas fa-key"></i> Password</label>
                        <input type="password" id="loginPassword" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="submit-btn"><i class="fas fa-shield-heart"></i> Authenticate & Login</button>
                    <div class="form-footer-note">
                        <i class="fas fa-robot"></i> Continuous behavioral trust score will verify your session.
                    </div>
                </form>
            </div>
        </div>

        <!-- RIGHT SIDE: RakshaAuth Branding with government style -->
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

    <!-- global toast / popup message (clean, non-intrusive) -->
    <div id="actionToast" style="position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%) translateY(100px); background: #1e2f3ad9; backdrop-filter: blur(12px); color: white; padding: 0.6rem 1.5rem; border-radius: 60px; font-size: 0.85rem; font-weight: 500; z-index: 2000; transition: transform 0.25s ease; pointer-events: none; display: flex; align-items: center; gap: 8px; font-family: monospace;">
        <i class="fas fa-shield-alt"></i> <span id="toastMsg">Ready</span>
    </div>


</body>
</html>
