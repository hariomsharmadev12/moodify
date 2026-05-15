@php
use App\Models\User;
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>RakshaAuth Admin | Manage Customers & Roles</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/manage_customer.css') }}">
</head>
<body>
    <div class="admin-wrapper">
        <!-- LEFT SIDEBAR -->
        <div class="admin-sidebar">
            <div class="sidebar-header">
                <div class="logo-area">
                    <div class="logo-icon"><i class="fas fa-shield-haltered"></i></div>
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
                <div class="nav-item active" data-link="manage-customers.html"><i class="fas fa-users"></i> <span>Manage Customers</span></div>
                <div class="nav-item" data-link="security-logs.html"><i class="fas fa-shield-virus"></i> <span>Security Logs</span></div>
                <div class="nav-item" data-link="role-management.html"><i class="fas fa-user-tag"></i> <span>Role Management</span></div>
                <div class="nav-item" data-link="settings.html"><i class="fas fa-cog"></i> <span>Settings</span></div>
                <div class="nav-item logout-item" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="admin-main">
            <div class="top-header">
                <div class="welcome-area">
                    <h3>Manage Customers <i class="fas fa-user-check"></i></h3>
                    <p><i class="fas fa-shield-alt"></i> Assign Roles · Approve New Users · Government Grade Access Control</p>
                </div>
                <div class="header-actions"></div>
            </div>

            <!-- Manage Customers Main Card -->
            <div class="manage-container">
                <div class="section-header">
                    <div class="section-title">
                        <i class="fas fa-users-viewfinder"></i> Registered Users & Role Assignment
                    </div>

                </div>

                <div class="customers-table-wrapper">
                    <table class="customers-table" id="customersTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email / Mobile</th>
                                <th>Current Role</th>
                                <th>Assign New Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="customersTableBody">
                            @foreach($users as $user)

                            <tr>
                                <td>{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>

                                <td>
                                    {{ $user->getRoleNames()->first() }}
                                </td>
                                <td colspan="2">

                                    <form action="{{ route('update.role') }}" method="POST" style="display:flex; gap:10px; align-items:center;">

                                        @csrf

                                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                                        <select name="role" class="role-select">

                                            <option value="customer" {{ $user->hasRole('customer') ? 'selected' : '' }}>
                                                Customer
                                            </option>

                                            <option value="premium" {{ $user->hasRole('premium') ? 'selected' : '' }}>
                                                Premium Customer
                                            </option>

                                            <option value="support" {{ $user->hasRole('support') ? 'selected' : '' }}>
                                                Support Agent
                                            </option>

                                            <option value="HR" {{ $user->hasRole('HR') ? 'selected' : '' }}>
                                                HR
                                            </option>

                                        </select>

                                        <button type="submit" class="update-role-btn">
                                            <i class="fas fa-user-edit"></i> Update Role
                                        </button>

                                    </form>

                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                <p style="font-size:0.7rem; margin-top:1rem; color:#6e95c0;"><i class="fas fa-history"></i> All role changes are logged & audited by AI behavioral engine</p>
            </div>
        </div>
    </div>

    <!-- Modal for Adding New User (with role assignment) -->
    <div id="addUserModal" class="modal-overlay">
        <div class="modal-container">
            <h3><i class="fas fa-user-shield"></i> Register New User & Assign Role</h3>
            <form id="addUserForm">
                <div class="modal-input-group">
                    <label>Full Name (as per Govt ID)</label>
                    <input type="text" id="newUserName" placeholder="e.g., Vikram Singh" required>
                </div>
                <div class="modal-input-group">
                    <label>Email / Mobile Number</label>
                    <input type="text" id="newUserEmail" placeholder="user@gov.in / 9876543210" required>
                </div>
                <div class="modal-input-group">
                    <label>Assign Initial Role</label>
                    <select id="newUserRole">
                        <option value="customer">Customer (Standard)</option>
                        <option value="premium">Premium Customer</option>
                        <option value="support">Support Agent</option>
                        <option value="auditor">Auditor (Read-Only)</option>
                    </select>
                </div>
                <div class="modal-buttons">
                    <button type="submit" class="modal-submit"><i class="fas fa-check"></i> Create & Assign</button>
                    <button type="button" class="modal-cancel" id="closeModalBtn"><i class="fas fa-times"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Toast Message -->
    <div id="adminToast" class="toast-message"><i class="fas fa-shield-alt"></i> <span id="toastMsg">Ready</span></div>


</body>
</html>
