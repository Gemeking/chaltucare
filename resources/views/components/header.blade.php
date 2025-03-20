<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaltu Care - Online Counseling</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">

</head>
<body>

<header class="header1">
    <nav class="navbar1">
        <!-- Logo -->
        <div class="logo1">🩺 Chaltu Care</div>

        <!-- Navigation Links -->
        <ul class="nav-menu1">
            <li><a href="/" class="nav-link1">Home</a></li>
            <li><a href="/about" class="nav-link1">About</a></li>
            <li><a href="/blog" class="nav-link1">Stories</a></li>
            <li><a href="/contact" class="nav-link1">Contact</a></li>
            <li class="profile-dropdown1">
                <div class="profile1">
                    <img src="default-profile.png" alt="Profile">
                    <span class="username1">Abel</span>
                    <i class="fas fa-caret-down"></i>
                </div>
                <ul class="dropdown-menu1">
                    <a href="user/profile">Profile Edit</a>
                    <a href="user/appointments">Appointment</a>
                    <a href="user/messages">Messaging</a>
                    <a href="user/file-sharing">File Sharing</a>
                    <a href="/video-calls">Video Calls</a></li>
                    <a href="/notifications">Notifications</a>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const profileDropdown1 = document.querySelector(".profile-dropdown1");
    const dropdownMenu1 = document.querySelector(".dropdown-menu1");
    const hamburger1 = document.querySelector(".hamburger1");
    const navMenu1 = document.querySelector(".nav-menu1");

    // Toggle Profile Dropdown
    profileDropdown1.addEventListener("click", function (event) {
        profileDropdown1.classList.toggle("active");
        event.stopPropagation();
    });

    // Toggle Mobile Menu
    hamburger1.addEventListener("click", function () {
        navMenu1.classList.toggle("active");
        hamburger1.classList.toggle("active");
    });

    // Close Dropdown and Mobile Menu when clicking outside
    document.addEventListener("click", function (event) {
        if (!profileDropdown1.contains(event.target)) {
            profileDropdown1.classList.remove("active");
        }
        if (!navMenu1.contains(event.target) && !hamburger1.contains(event.target)) {
            navMenu1.classList.remove("active");
            hamburger1.classList.remove("active");
        }
    });
});
</script>

</body>
</html>
