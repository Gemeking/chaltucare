<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #3182CE;
            --primary-light: rgba(49, 130, 206, 0.1);
            --secondary: #2C5282;
            --accent: #38B2AC;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --light: #F7FAFC;
            --dark: #1A202C;
            --gray: #E2E8F0;
            --text-color: #2D3748;
            --card-bg: #FFFFFF;
            --header-bg: #FFFFFF;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        body.dark-mode {
            --text-color: #E2E8F0;
            --card-bg: #2D3748;
            --header-bg: #2D3748;
            --gray: #4A5568;
            background-color: #1A202C;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: none;
            margin-bottom: 24px;
            background-color: var(--card-bg);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .card-header {
            background-color: var(--header-bg);
            border-bottom: 1px solid var(--gray);
            border-radius: 12px 12px 0 0 !important;
            padding: 16px 20px;
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs {
            border-bottom: 2px solid var(--gray);
        }

        .nav-tabs .nav-link {
            color: var(--text-color);
            font-weight: 500;
            border: none;
            padding: 12px 20px;
            position: relative;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary);
            background: transparent;
            border-bottom: 3px solid var(--primary);
            opacity: 1;
        }

        .nav-tabs .nav-link:hover {
            color: var(--primary);
            opacity: 1;
        }

        .badge {
            font-weight: 500;
            padding: 6px 10px;
            border-radius: 6px;
        }

        .badge-user {
            background-color: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
        }

        .badge-advisor {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10B981;
        }

        .badge-admin {
            background-color: rgba(139, 92, 246, 0.1);
            color: #8B5CF6;
        }

        .btn-edit {
            background-color: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-delete {
            background-color: rgba(239, 68, 68, 0.1);
            color: #EF4444;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .doctor-profile {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .doctor-profile i {
            color: white !important;
        }

        .user-details, .user-system-info {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .user-system-info i {
            color: var(--primary);
        }

        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        /* Dark mode specific fixes */
        body.dark-mode .table {
            color: var(--text-color);
        }

        body.dark-mode .table-hover tbody tr:hover {
            color: var(--text-color);
            background-color: rgba(255, 255, 255, 0.05);
        }

        body.dark-mode .form-control, 
        body.dark-mode .form-select {
            background-color: #1A202C;
            color: var(--text-color);
            border-color: #4A5568;
        }

        body.dark-mode .modal-content {
            background-color: var(--card-bg);
            color: var(--text-color);
        }

        body.dark-mode .btn-close {
            filter: invert(1);
        }

        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            border-radius: 8px;
            padding: 10px 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: none;
            align-items: center;
        }

        .toast.show {
            display: flex;
            animation: fadeIn 0.3s ease-in-out;
        }

        .toast-success {
            background-color: var(--success);
            color: white;
        }

        .toast-warning {
            background-color: var(--warning);
            color: white;
        }

        .toast-info {
            background-color: var(--primary);
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .nav-tabs .nav-link {
                padding: 10px 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Theme Toggle Button -->
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon" id="theme-icon"></i>
    </button>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4"><i class="fas fa-users-cog me-2"></i>User Management</h2>
                
                <!-- Doctor Profile Section -->
                <div class="doctor-profile">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Dr. Chaltu Regassa">
                        </div>
                        <div class="col-md-10">
                            <h3><i class="fas fa-user-md me-2"></i>Dr. Chaltu Regassa</h3>
                            <p class="mb-2"><i class="fas fa-graduation-cap me-2"></i>MD, Gondar University, Ethiopia</p>
                            <p class="mb-0"><i class="fas fa-heart me-2"></i>Specializing in Online Health Counseling</p>
                        </div>
                    </div>
                </div>

                <!-- User System Information -->
                <div class="user-system-info mb-4">
                    <h4><i class="fas fa-info-circle me-2"></i>About Our User System</h4>
                    <div class="row mt-3">
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-shield-alt"></i>
                                <h5 class="mt-2">Secure Accounts</h5>
                                <p class="small">All user accounts are protected</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-user-tag"></i>
                                <h5 class="mt-2">Role Management</h5>
                                <p class="small">Flexible user role assignments</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="fas fa-history"></i>
                                <h5 class="mt-2">Activity Tracking</h5>
                                <p class="small">Monitor user activity and history</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs for User Types -->
                <ul class="nav nav-tabs mb-4" id="userTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">
                            <i class="fas fa-users me-1"></i> All Users
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="patients-tab" data-bs-toggle="tab" data-bs-target="#patients" type="button" role="tab">
                            <i class="fas fa-user-injured me-1"></i> Patients
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="advisors-tab" data-bs-toggle="tab" data-bs-target="#advisors" type="button" role="tab">
                            <i class="fas fa-user-md me-1"></i> Health Advisors
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins" type="button" role="tab">
                            <i class="fas fa-user-shield me-1"></i> Administrators
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="userTabsContent">
                    <!-- All Users -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0"><i class="fas fa-users me-2"></i>All Users</h5>
                                <button class="btn btn-primary btn-sm" onclick="showAddUserModal()">
                                    <i class="fas fa-plus me-1"></i> Add User
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Profile</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Joined</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#USR-1001</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-2" width="40" height="40">
                                                        <span>Jane Smith</span>
                                                    </div>
                                                </td>
                                                <td>jane.smith@example.com</td>
                                                <td><span class="badge badge-user">User</span></td>
                                                <td>Oct 15, 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editUser(1001)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="deleteUser(1001)">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#USR-1002</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-2" width="40" height="40">
                                                        <span>John Doe</span>
                                                    </div>
                                                </td>
                                                <td>john.doe@example.com</td>
                                                <td><span class="badge badge-advisor">Advisor</span></td>
                                                <td>Oct 10, 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editUser(1002)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="deleteUser(1002)">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#USR-1003</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-2" width="40" height="40">
                                                        <span>Sarah Johnson</span>
                                                    </div>
                                                </td>
                                                <td>sarah.j@example.com</td>
                                                <td><span class="badge badge-admin">Admin</span></td>
                                                <td>Oct 5, 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editUser(1003)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="deleteUser(1003)">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Patients -->
                    <div class="tab-pane fade" id="patients" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-user-injured me-2"></i>Patients</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Profile</th>
                                                <th>Email</th>
                                                <th>Last Appointment</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#USR-1001</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-2" width="40" height="40">
                                                        <span>Jane Smith</span>
                                                    </div>
                                                </td>
                                                <td>jane.smith@example.com</td>
                                                <td>Oct 15, 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editUser(1001)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="deleteUser(1001)">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Health Advisors -->
                    <div class="tab-pane fade" id="advisors" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-user-md me-2"></i>Health Advisors</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Profile</th>
                                                <th>Email</th>
                                                <th>Specialty</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#USR-1002</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-2" width="40" height="40">
                                                        <span>John Doe</span>
                                                    </div>
                                                </td>
                                                <td>john.doe@example.com</td>
                                                <td>General Practice</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editUser(1002)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="deleteUser(1002)">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Administrators -->
                    <div class="tab-pane fade" id="admins" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-user-shield me-2"></i>Administrators</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Profile</th>
                                                <th>Email</th>
                                                <th>Access Level</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#USR-1003</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-2" width="40" height="40">
                                                        <span>Sarah Johnson</span>
                                                    </div>
                                                </td>
                                                <td>sarah.j@example.com</td>
                                                <td>Full Access</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <button class="btn btn-edit btn-sm me-2" onclick="editUser(1003)">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-delete btn-sm" onclick="deleteUser(1003)">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Details Sidebar -->
            <div class="col-lg-4">
                <div class="user-details">
                    <h4><i class="fas fa-chart-pie me-2"></i>User Statistics</h4>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-users me-2"></i>Total Users</span>
                            <strong>1,248</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-user-injured me-2"></i>Patients</span>
                            <strong>1,120</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-user-md me-2"></i>Health Advisors</span>
                            <strong>98</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span><i class="fas fa-user-shield me-2"></i>Administrators</span>
                            <strong>30</strong>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-user-clock me-2"></i>New This Month</span>
                            <strong>142</strong>
                        </div>
                    </div>
                </div>

                <div class="user-details">
                    <h4><i class="fas fa-question-circle me-2"></i>User Management Guide</h4>
                    <ul class="mt-3" style="padding-left: 20px;">
                        <li class="mb-2">Verify user information before editing</li>
                        <li class="mb-2">Assign appropriate roles to each user</li>
                        <li class="mb-2">Deactivate rather than delete when possible</li>
                        <li class="mb-2">Document all administrative changes</li>
                        <li>Follow privacy regulations for user data</li>
                    </ul>
                </div>

                <div class="user-details">
                    <h4><i class="fas fa-user-md me-2"></i>About Dr. Chaltu Regassa</h4>
                    <p class="mt-3">
                        Hello! I'm Dr. Chaltu Regassa, a graduate of Gondar University, Ethiopia, specializing in online health counseling. 
                        Our user management system helps maintain a secure environment for both patients and healthcare providers.
                    </p>
                    <p>
                        With proper user roles and permissions, we ensure each team member has appropriate access to our systems.
                    </p>
                    <div class="d-flex">
                        <span class="me-3"><i class="fas fa-star me-1"></i>4.9/5</span>
                        <span class="me-3"><i class="fas fa-user-friends me-1"></i>1,240+ Patients</span>
                        <span><i class="fas fa-globe me-1"></i>Online</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-user-plus me-2"></i>Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="userName" required>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">Role</label>
                            <select class="form-select" id="userRole" required>
                                <option value="user">Patient</option>
                                <option value="advisor">Health Advisor</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-primary" onclick="addUser()">
                        <i class="fas fa-save me-1"></i> Save User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-user-edit me-2"></i>Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <input type="hidden" id="editUserId">
                        <div class="mb-3">
                            <label for="editUserName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="editUserName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUserEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editUserEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUserRole" class="form-label">Role</label>
                            <select class="form-select" id="editUserRole" required>
                                <option value="user">Patient</option>
                                <option value="advisor">Health Advisor</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editUserStatus" class="form-label">Status</label>
                            <select class="form-select" id="editUserStatus" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-primary" onclick="saveUserChanges()">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Sample user data
        const users = [
            {
                id: 1001,
                name: "Jane Smith",
                email: "jane.smith@example.com",
                role: "user",
                status: "active",
                joinDate: "2023-10-15",
                lastAppointment: "2023-10-15",
                avatar: "https://randomuser.me/api/portraits/women/32.jpg"
            },
            {
                id: 1002,
                name: "John Doe",
                email: "john.doe@example.com",
                role: "advisor",
                status: "active",
                joinDate: "2023-10-10",
                specialty: "General Practice",
                avatar: "https://randomuser.me/api/portraits/men/45.jpg"
            },
            {
                id: 1003,
                name: "Sarah Johnson",
                email: "sarah.j@example.com",
                role: "admin",
                status: "active",
                joinDate: "2023-10-05",
                accessLevel: "Full Access",
                avatar: "https://randomuser.me/api/portraits/women/68.jpg"
            }
        ];

        // Theme toggle functionality
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const icon = document.getElementById('theme-icon');
            const isDarkMode = document.body.classList.contains('dark-mode');
            
            if (isDarkMode) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                localStorage.setItem('theme', 'light');
            }
        }

        // Check for saved theme preference
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
                const icon = document.getElementById('theme-icon');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
        });

        // Show add user modal
        function showAddUserModal() {
            const modal = new bootstrap.Modal(document.getElementById('addUserModal'));
            modal.show();
        }

        // Add a new user
        function addUser() {
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;
            const role = document.getElementById('userRole').value;
            
            if (name && email && role) {
                // In a real app, you would make an API call here
                showToast(`User ${name} added successfully`, 'success');
                const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
                modal.hide();
                document.getElementById('addUserForm').reset();
                // You would typically refresh the user list here
            } else {
                showToast('Please fill all fields', 'warning');
            }
        }

        // Edit user
        function editUser(userId) {
            const user = users.find(u => u.id === userId);
            if (user) {
                document.getElementById('editUserId').value = user.id;
                document.getElementById('editUserName').value = user.name;
                document.getElementById('editUserEmail').value = user.email;
                document.getElementById('editUserRole').value = user.role;
                document.getElementById('editUserStatus').value = user.status;
                
                const modal = new bootstrap.Modal(document.getElementById('editUserModal'));
                modal.show();
            }
        }

        // Save user changes
        function saveUserChanges() {
            const userId = parseInt(document.getElementById('editUserId').value);
            const name = document.getElementById('editUserName').value;
            const email = document.getElementById('editUserEmail').value;
            const role = document.getElementById('editUserRole').value;
            const status = document.getElementById('editUserStatus').value;
            
            if (name && email && role && status) {
                // In a real app, you would make an API call here
                showToast(`User ${name} updated successfully`, 'success');
                const modal = bootstrap.Modal.getInstance(document.getElementById('editUserModal'));
                modal.hide();
                // You would typically refresh the user list here
            } else {
                showToast('Please fill all fields', 'warning');
            }
        }

        // Delete user
        function deleteUser(userId) {
            if (confirm(`Are you sure you want to delete user #${userId}?`)) {
                // In a real app, you would make an API call here
                showToast(`User #${userId} deleted`, 'success');
                // You would typically refresh the user list here
            }
        }

        // Show toast notification
        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `toast show align-items-center text-white bg-${type}`;
            toast.style.position = 'fixed';
            toast.style.bottom = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
            toast.style.borderRadius = '8px';
            toast.style.padding = '10px 20px';
            toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            toast.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} me-2"></i>
                    <strong>${message}</strong>
                </div>
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>