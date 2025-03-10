<div class="d-lg-none text-center mb-3">
    <button class="btn btn-primary sidebar-toggle-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
        <i class="fas fa-bars"></i>
    </button>
</div>

<!-- Sidebar (Visible on Desktop) -->
<div class="col-md-3 d-none d-lg-block"> <!-- Hide on mobile, show on desktop -->
    <div class="sidebar">
        <h4 class="text-center mb-4">Doctor Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/users/index') }}')">
                    <i class="fas fa-users me-2"></i>Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/payments/index') }}')">
                    <i class="fas fa-credit-card me-2"></i>Payments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/blogs/index') }}')">
                    <i class="fas fa-blog me-2"></i>Blogs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/appointments/index') }}')">
                    <i class="fas fa-calendar-check me-2"></i>Appointments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/messages/index') }}')">
                    <i class="fas fa-envelope me-2"></i>Messages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/files/index') }}')">
                    <i class="fas fa-file-alt me-2"></i>Files
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/report') }}')">
                    <i class="fas fa-chart-line me-2"></i>Report
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/videocall/index') }}')">
                    <i class="fas fa-video me-2"></i>Video Calls
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="loadContent('{{ url('admin/notifications') }}')">
                    <i class="fas fa-bell me-2"></i>Notifications
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Offcanvas Sidebar (Visible on Mobile) -->
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel">Doctor Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/users/index') }}')">
                        <i class="fas fa-users me-2"></i>Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/payments/index') }}')">
                        <i class="fas fa-credit-card me-2"></i>Payments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/blogs/index') }}')">
                        <i class="fas fa-blog me-2"></i>Blogs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/appointments/index') }}')">
                        <i class="fas fa-calendar-check me-2"></i>Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/messages/index') }}')">
                        <i class="fas fa-envelope me-2"></i>Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/files/index') }}')">
                        <i class="fas fa-file-alt me-2"></i>Files
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/report') }}')">
                        <i class="fas fa-chart-line me-2"></i>Report
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/videocall/index') }}')">
                        <i class="fas fa-video me-2"></i>Video Calls
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="handleSidebarLinkClick('{{ url('admin/notifications') }}')">
                        <i class="fas fa-bell me-2"></i>Notifications
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Add Animation and Toggle Icon Styles -->
<link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">

<!-- Script to Handle Sidebar Link Clicks -->
<script src="{{ asset('js/admin/sidebar.js') }}"></script>