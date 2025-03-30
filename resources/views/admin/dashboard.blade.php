@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

    <!-- Dashboard Content -->
    <div class="dashboard-container1 container-fluid">
    <br></br></br>
        <div class="row">
            <!-- Include Sidebar -->
            @include('admin.dashboardsidebar')
            <br></br>

            <!-- Main Content -->
            <div class="col-md-9 p-4" id="dashboard-content">
                <h2>Welcome, Dr. John Doe</h2>

                <!-- Appointments Section -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-calendar-check me-2"></i>Upcoming Appointments
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-user me-2"></i>Appointment with Jane Smith - 10:00 AM, 2023-10-15
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-user me-2"></i>Appointment with Mike Johnson - 2:00 PM, 2023-10-16
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-user me-2"></i>Appointment with Sarah Lee - 11:00 AM, 2023-10-17
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Messages Section -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-envelope me-2"></i>Recent Messages
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-user me-2"></i>From Jane Smith: "Can we reschedule the appointment?"
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-user me-2"></i>From Mike Johnson: "Thank you for the consultation!"
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-user me-2"></i>From Sarah Lee: "I have a question about my prescription."
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Notifications Section -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-bell me-2"></i>Notifications
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-info-circle me-2"></i>New appointment request from John Doe.
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-info-circle me-2"></i>Payment received for appointment with Jane Smith.
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-info-circle me-2"></i>Your blog post has been shared 10 times.
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Recent Activities Section -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-history me-2"></i>Recent Activities
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <i class="fas fa-check-circle me-2"></i>Appointment with Jane Smith marked as completed.
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check-circle me-2"></i>New blog post published: "Health Tips for 2023."
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-check-circle me-2"></i>Video call scheduled with Mike Johnson.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Logout Confirmation
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                alert("Logging out..."); // Replace with actual logout logic
                // Example: window.location.href = '/logout';
            }
        }

        // Save Profile Changes
        function saveProfileChanges() {
            const newName = document.getElementById('profileName').value;
            const profileImage = document.getElementById('profileImage').files[0];

            if (profileImage) {
                alert(`Profile image uploaded: ${profileImage.name}`);
            }
            if (newName) {
                alert(`Name changed to: ${newName}`);
            }

            // Close the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('editProfileModal'));
            modal.hide();
        }

        // Load Content Dynamically
        function loadContent(url) {
            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    $('#dashboard-content').html(data); // Insert fetched content into the placeholder
                },
                error: function () {
                    alert("Failed to load content.");
                }
            });
        }
    </script>
@endsection