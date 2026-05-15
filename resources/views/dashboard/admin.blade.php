@php
use App\Models\User;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>RakshaAuth Admin | Government Security Dashboard</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">
</head>
<body>
    <div class="admin-wrapper">
        <!-- LEFT SIDEBAR - DARK NAVY with links -->
        <div class="admin-sidebar">
            <div class="sidebar-header">
                <div class="logo-area">
                    <div class="logo-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="logo-text">
                        <h3>RakshaAuth</h3>
                        <p>Govt Admin Portal</p>
                    </div>
                </div>
            </div>
            <div class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-item" data-section="dashboard" style="text-decoration: none;">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('manage.customers') }}" class="nav-item" data-section="manageCustomers" style="text-decoration: none;">
                    <i class="fas fa-users"></i>
                    <span>Manage Customers</span>
                </a>
                <div class="nav-item" data-section="securityLogs">
                    <i class="fas fa-shield-virus"></i> <span>Security Logs</span>
                </div>
                <div class="nav-item" data-section="roleManagement">
                    <i class="fas fa-user-tag"></i> <span>Role Management</span>
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

        <!-- MAIN RIGHT CONTENT -->
        <div class="admin-main">
            <!-- Top Header: Welcome Admin + Admin Profile + Notifications -->
            <div class="top-header">
                <div class="welcome-area">
                    <h3>Welcome, {{ Auth::user()->name }} <i class="fas fa-crown"></i></h3>
                    <p><i class="fas fa-shield-alt"></i> System Security Active · AI Behavioral Monitoring Online</p>
                </div>
                <div class="header-actions">
                    <div class="admin-profile" id="adminProfileBtn">
                        <i class="fas fa-user-circle"></i> <span>Admin Profile</span>
                    </div>
                    <div class="notifications" id="notifBtn">
                        <i class="fas fa-bell"></i> <span>Notifications</span>
                    </div>
                </div>
            </div>

            <!-- DASHBOARD SECTION (default) -->
            <div id="dashboardSection">
                <!-- Main Cards Grid 4 cards -->
                <div class="cards-grid">
                    <div class="glass-card">
                        <div class="card-header">
                            <span>Total Users</span>
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-value">{{ User::count() }}</div>
                        <div class="card-sub">Registered users · Active accounts</div>
                    </div>
                    <div class="glass-card">
                        <div class="card-header">
                            <span>Active Sessions</span>
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="card-value">{{User::count()}}</div>
                        <div class="card-sub">Live behavioral sessions</div>
                    </div>
                    <div class="glass-card">
                        <div class="card-header">
                            <span>Security Alerts</span>
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="card-value" style="color:#ffaa88;">0</div>
                        <div class="card-sub"><span class="alert-badge"><i class="fas fa-skull"></i> 0 Suspicious Logins</span></div>
                    </div>
                    <div class="glass-card">
                        <div class="card-header">
                            <span>System Status</span>
                            <i class="fas fa-microchip"></i>
                        </div>
                        <div class="card-value" style="font-size:1.2rem;">AI Monitoring Active ✅</div>
                        <div class="card-sub">Real-time threat detection</div>
                    </div>
                </div>

                <!-- Manage Customers Table (main feature) -->
                <div class="customers-table-section">
                    <div class="section-title"><i class="fas fa-table-list"></i> Manage Customers · Registered Users</div>
                    <table class="customers-table" id="customersTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>

                            @foreach($users as $user)

                            <tr>
                                <td>{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>

                                <td>
                                    {{ $user->getRoleNames()->first() }}
                                </td>

                                <td>

                                    @can('delete customer')

                                    <button class="delete-btn">
                                        Delete
                                    </button>

                                    @endcan

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                        </tbody>
                    </table>
                    <p style="font-size:0.7rem; margin-top:1rem; color:#6e95c0;"><i class="fas fa-shield-alt"></i> Managed By GOVT OF INDIA</p>
                </div>
            </div>

            <!-- DYNAMIC SECTIONS (hidden initially) -->
            <div id="manageCustomersSection" class="dynamic-section">
                <div class="customers-table-section">
                    <div class="section-title"><i class="fas fa-user-plus"></i> Customer Management Console</div>
                    <table class="customers-table" id="customersTable2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Rahul Sharma</td>
                                <td>rahul@gmail.com</td>
                                <td>customer</td>
                                <td><button class="delete-btn">Delete</button></td>
                            </tr>
                            <tr>
                                <td>Priya Mehta</td>
                                <td>priya@bank.gov.in</td>
                                <td>customer</td>
                                <td><button class="delete-btn">Delete</button></td>
                            </tr>
                            <tr>
                                <td>Amit Singh</td>
                                <td>amit.s@digitalindia.in</td>
                                <td>premium</td>
                                <td><button class="delete-btn">Delete</button></td>
                            </tr>
                            <tr>
                                <td>Neha Gupta</td>
                                <td>neha.g@upi.gov</td>
                                <td>customer</td>
                                <td><button class="delete-btn">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="action-btn" style="margin-top:1rem;">+ Add New Customer (Admin Only)</div>
                </div>
            </div>
            <div id="securityLogsSection" class="dynamic-section">
                <div class="customers-table-section">
                    <div class="section-title"><i class="fas fa-history"></i> Security Logs (Last 7 days)</div>
                    <p>🔒 14 May 2026 - 3 suspicious login attempts from IP 203.x.x.x (blocked)</p>
                    <p>🔒 13 May 2026 - Admin role change by Super Admin (authorized)</p>
                    <p>🔒 12 May 2026 - Behavioral anomaly detected for user 'Rahul' (low risk)</p>
                    <p>🔒 11 May 2026 - New device enrollment for UPI access</p>
                    <p style="margin-top:1rem; color:#6e95c0;">✅ AI Audit trail integrity verified.</p>
                </div>
            </div>
            <div id="roleManagementSection" class="dynamic-section">
                <div class="customers-table-section">
                    <div class="section-title"><i class="fas fa-user-shield"></i> Role Management (RBAC)</div>
                    <p><strong>Admin:</strong> Full system access, user management, security logs</p>
                    <p><strong>Customer Support:</strong> View customers, limited edit</p>
                    <p><strong>Auditor:</strong> Read-only logs & reports</p>
                    <button class="delete-btn" style="background:#2c6280; color:white; margin-top:1rem;">Edit Roles & Permissions</button>
                </div>
            </div>
            <div id="settingsSection" class="dynamic-section">
                <div class="customers-table-section">
                    <div class="section-title"><i class="fas fa-sliders-h"></i> System & Security Settings</div>
                    <p>🔹 AI Behavioral Sensitivity: High</p>
                    <p>🔹 Session Timeout: 15 minutes</p>
                    <p>🔹 MFA Enforcement: Enabled for all admins</p>
                    <button class="delete-btn" style="background:#1e5f6e;">Save Settings</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Message -->
    <div id="adminToast" class="action-toast">
        <i class="fas fa-shield-alt"></i> <span id="toastMsg">Admin ready</span>
    </div>


</body>
</html>
