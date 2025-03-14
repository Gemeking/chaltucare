<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaltu Care - Online Counseling</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General Reset */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #A7E4FF, #6FA3EF, #5D4E8E);
            color: white;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(147, 149, 149, 0.7);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Logo */
        .logo {
            font-size: 1.8rem;
            font-weight: 600;
            color: white;
        }

        /* Navigation Links */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .nav-link {
            font-size: 1.1rem;
            font-weight: 500;
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-link:hover { color: #00ff00; }

        /* Profile Dropdown */
        .profile-dropdown {
            position: relative;
            cursor: pointer;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }

        .username {
            font-size: 1.1rem;
            font-weight: 500;
            color: white;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: rgba(114, 109, 109, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: none;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
            width: 180px;
        }

        .profile-dropdown.active .dropdown-menu { display: flex; }

        .dropdown-menu a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            padding: 10px;
            display: block;
            transition: background 0.3s ease;
        }

        .dropdown-menu a:hover { background: rgba(0, 255, 0, 0.3); }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            cursor: pointer;
        }

        .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            background: white;
            transition: all 0.3s ease-in-out;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hamburger { display: block; }

            .nav-menu {
                position: fixed;
                left: -100%;
                top: 70px;
                flex-direction: column;
                background: rgba(0, 0, 0, 0.9);
                backdrop-filter: blur(10px);
                width: 100%;
                text-align: center;
                transition: 0.3s;
                padding: 1rem 0;
            }

            .nav-item { margin: 1rem 0; }

            .nav-menu.active { left: 0; }

            .hamburger.active .bar:nth-child(2) { opacity: 0; }

            .hamburger.active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }

            .hamburger.active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }
        }
    </style>
</head>
<body>

<header class="header">
    <nav class="navbar">
        <!-- Logo -->
        <div class="logo">🩺 Chaltu Care</div>

        <!-- Navigation Links -->
        <ul class="nav-menu">
            <li><a href="/" class="nav-link">Home</a></li>
            <li><a href="/about" class="nav-link">About</a></li>
            <li><a href="/blog" class="nav-link">Stories</a></li>
            <li><a href="/contact" class="nav-link">Contact</a></li>
            <li class="profile-dropdown">
                <div class="profile">
                    <img src="default-profile.png" alt="Profile">
                    <span class="username">Abel</span>
                    <i class="fas fa-caret-down"></i>
                </div>
                <ul class="dropdown-menu">
                    <li><a href="/profile">Profile Edit</a></li>
                    <li><a href="/appointment">Appointment</a></li>
                    <li><a href="/messaging">Messaging</a></li>
                    <li><a href="/file-sharing">File Sharing</a></li>
                    <li><a href="/video-calls">Video Calls</a></li>
                    <li><a href="/notifications">Notifications</a></li>
                </ul>
            </li>
        </ul>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileDropdown = document.querySelector(".profile-dropdown");
        const dropdownMenu = document.querySelector(".dropdown-menu");
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");

        // Toggle Profile Dropdown
        profileDropdown.addEventListener("click", function (event) {
            profileDropdown.classList.toggle("active");
            event.stopPropagation();
        });

        // Toggle Mobile Menu
        hamburger.addEventListener("click", function () {
            navMenu.classList.toggle("active");
            hamburger.classList.toggle("active");
        });

        // Close Profile Dropdown and Mobile Menu when clicking outside
        document.addEventListener("click", function (event) {
            if (!profileDropdown.contains(event.target)) {
                profileDropdown.classList.remove("active");
            }
            if (!navMenu.contains(event.target) && !hamburger.contains(event.target)) {
                navMenu.classList.remove("active");
                hamburger.classList.remove("active");
            }
        });
    });
</script>

</body>
</html>
