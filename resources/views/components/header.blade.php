<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaltu Care - Online Counseling</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/components/header.css') }}" rel="stylesheet">
    <script src="{{ asset('js/components/header.js') }}"></script>
</head>
<body>

<header class="header1">
    <nav class="navbar1">
        <!-- Logo -->
        <a href="/" class="logo1">Chaltu Care</a>

        <!-- Navigation Links -->
        <ul class="nav-menu1">
            <li><a href="/" class="nav-link1">Home</a></li>
            <li><a href="/about" class="nav-link1">About</a></li>
            <li><a href="/blog" class="nav-link1">Stories</a></li>
            <li><a href="/contact" class="nav-link1">Contact</a></li>
            <!-- Notification Bell -->
            <li class="notification-container1">
                <button class="notification-bell1" id="notificationBell">
                    <i class="fas fa-bell"></i>
                    <span class="notification-count1" id="notificationCount">3</span>
                </button>
                
                <div class="notification-popup1" id="notificationPopup">
                    <div class="notification-header1">
                        <h3>Notifications</h3>
                        <button class="mark-all-read1" id="markAllRead">Mark all as read</button>
                    </div>
                    <div class="notification-list1" id="notificationList">
                        <!-- Sample notifications -->
                        <div class="notification-item1 unread">
                            <div class="notification-content1">
                                <p class="notification-message1">Your appointment with Dr. Smith is confirmed</p>
                                <p class="notification-time1">2 minutes ago</p>
                            </div>
                        </div>
                        <div class="notification-item1">
                            <div class="notification-content1">
                                <p class="notification-message1">New message from your counselor</p>
                                <p class="notification-time1">1 hour ago</p>
                            </div>
                        </div>
                        <div class="notification-item1 unread">
                            <div class="notification-content1">
                                <p class="notification-message1">Weekly mental health tips available</p>
                                <p class="notification-time1">3 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="notification-footer1">
                        <a href="/notification" class="view-all1">View all notifications</a>
                    </div>
                </div>
            </li>
            <!-- Profile Dropdown -->
            <li class="profile-dropdown1">
                <div class="profile1">
                    <img src="default-profile.png" alt="Profile">
                    <span class="username1">Abel</span>
                    <i class="fas fa-caret-down"></i>
                </div>
                <ul class="dropdown-menu1">
                    <a href="user/profile"><i class="fas fa-user-edit"></i>Profile Edit</a>
                    <a href="user/appointments"><i class="fas fa-calendar-check"></i>Appointment</a>
                    <a href="user/messages"><i class="fas fa-comments"></i>Messaging</a>
                    <a href="/video-calls"><i class="fas fa-video"></i>Video Calls</a>
                    <a href="/logout" class="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </ul>
            </li>
        </ul>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger1">
            <span class="bar1"></span>
            <span class="bar1"></span>
            <span class="bar1"></span>
        </div>
    </nav>
</header>

</body>
</html>