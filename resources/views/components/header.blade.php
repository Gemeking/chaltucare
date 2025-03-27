<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaltu Care - Online Counseling</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Light Mode Defaults */
            --primary: #3182CE;
            --secondary: #2C5282;
            --background: #FFFFFF;
            --text: #2D3748;
            --accent: #38B2AC;
            --header-bg: #FFFFFF;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* Dark Mode Overrides */
        body.dark-mode {
            --primary: #63B3ED;
            --secondary: #4299E1;
            --background: #1A202C;
            --text: #E2E8F0;
            --accent: #4FD1C5;
            --header-bg: #1A202C;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text);
            transition: var(--transition);
        }

        .header1 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: var(--header-bg);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .navbar1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .logo1:hover {
            color: var(--secondary);
            transform: scale(1.02);
        }

        .logo1::before {
            content: "🩺";
            font-size: 1.5rem;
        }

        .nav-menu1 {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .nav-link1 {
            position: relative;
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            font-size: 1.1rem;
            transition: var(--transition);
            padding: 0.5rem 0;
        }

        .nav-link1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: var(--transition);
        }

        .nav-link1:hover::after {
            width: 100%;
        }

        .nav-link1:hover {
            color: var(--primary);
        }

        .profile-dropdown1 {
            position: relative;
            cursor: pointer;
        }

        .profile1 {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            transition: var(--transition);
        }

        .profile1:hover {
            background-color: rgba(99, 179, 237, 0.1);
        }

        .profile1 img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary);
        }

        .username1 {
            font-weight: 500;
            color: var(--text);
        }

        .dropdown-menu1 {
            position: absolute;
            top: 120%;
            right: 0;
            width: 220px;
            background-color: var(--header-bg);
            border-radius: 10px;
            box-shadow: var(--shadow);
            padding: 1rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
            z-index: 1000;
        }

        .profile-dropdown1.active .dropdown-menu1 {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu1 a {
            display: block;
            padding: 0.7rem 1.5rem;
            text-decoration: none;
            color: var(--text);
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .dropdown-menu1 a:hover {
            background-color: rgba(99, 179, 237, 0.1);
            color: var(--primary);
            padding-left: 1.7rem;
        }

        .dropdown-menu1 a i {
            margin-right: 0.7rem;
            width: 20px;
            text-align: center;
        }

        .dropdown-menu1 a.logout {
            border-top: 1px solid var(--text);
            margin-top: 0.5rem;
            padding-top: 0.7rem;
            opacity: 0.8;
        }

        .hamburger1 {
            display: none;
            cursor: pointer;
            padding: 0.5rem;
        }

        .bar1 {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            background-color: var(--text);
            transition: var(--transition);
        }

        /* Mobile Responsiveness */
        @media (max-width: 992px) {
            .hamburger1 {
                display: block;
            }

            .nav-menu1 {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                background-color: var(--header-bg);
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
                padding: 2rem 0;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                transition: var(--transition);
                z-index: 999;
            }

            .nav-menu1.active {
                left: 0;
            }

            .profile-dropdown1 {
                margin-top: 1rem;
            }

            .dropdown-menu1 {
                top: 100%;
                right: 50%;
                transform: translate(50%, -10px);
                width: 200px;
            }

            .profile-dropdown1.active .dropdown-menu1 {
                transform: translate(50%, 0);
            }

            .hamburger1.active .bar1:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }

            .hamburger1.active .bar1:nth-child(2) {
                opacity: 0;
            }

            .hamburger1.active .bar1:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }
        }

        /* Scrolled header style */
        .header1.scrolled {
            padding: 0.5rem 2rem;
            background-color: var(--header-bg);
            backdrop-filter: blur(10px);
        }
    </style>
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
                    <a href="user/file-sharing"><i class="fas fa-file-upload"></i>File Sharing</a>
                    <a href="/video-calls"><i class="fas fa-video"></i>Video Calls</a>
                    <a href="/notifications"><i class="fas fa-bell"></i>Notifications</a>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileDropdown1 = document.querySelector(".profile-dropdown1");
        const dropdownMenu1 = document.querySelector(".dropdown-menu1");
        const hamburger1 = document.querySelector(".hamburger1");
        const navMenu1 = document.querySelector(".nav-menu1");
        const header = document.querySelector(".header1");

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

        // Header scroll effect
        window.addEventListener("scroll", function() {
            if (window.scrollY > 50) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    });
</script>

</body>
</html>