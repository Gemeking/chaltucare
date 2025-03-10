<header class="header">
    <nav class="navbar1">
        <!-- Logo -->
        <div class="logo">
            <span>🩺 Chaltu Care</span>
        </div>

        <!-- Navigation Links -->
        <ul class="nav-menu1">
            <li class="nav-item1">
                <a href="{{ url('/') }}" class="nav-link1">Home</a>
            </li>
            <li class="nav-item1">
                <a href="{{ url('/about') }}" class="nav-link1">About</a>
            </li>
            <li class="nav-item1">
                <a href="{{ url('/services') }}" class="nav-link1">Services</a>
            </li>
            <li class="nav-item1">
                <a href="{{ url('/contact') }}" class="nav-link1">Contact</a>
            </li>
            <li class="nav-item1 profile-dropdown">
                <div class="profile">
                    <img src="{{ Auth::user()->profile->profile_picture_url ?? 'default-profile.png' }}" alt="Profile Picture" class="profile-img">
                    <span class="username">abel</span>
                    <i class="fas fa-caret-down"></i>
                </div>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/profile') }}">Profile Edit</a></li>
                    <li><a href="{{ url('/appointment') }}">Appointment</a></li>
                    <li><a href="{{ url('/Messaging') }}">Messaging</a></li>
                    <li><a href="{{ url('/File Sharing') }}">File Sharing</a></li>
                    <li><a href="{{ url('/Video Calls') }}">Video Calls</a></li>
                    <li><a href="{{ url('/Notifications') }}">Notifications</a></li>
                    <li><a href="{{ url('/Payments') }}">Payments</a></li>
                    <li><a href="{{ url('/Blogs') }}">Blogs</a></li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
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
<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Header and Navbar */
    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        background: rgba(147, 149, 149, 0.7); /* Semi-transparent dark background */
        backdrop-filter: blur(10px); /* Blur effect */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .navbar1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Logo */
    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo span {
        font-size: 1.8rem;
        font-weight: 600;
        color: #fff; /* White text */
        animation: fadeIn 2s ease-in-out;
    }

    /* Navigation Links */
    .nav-menu1 {
        display: flex;
        align-items: center;
        gap: 2rem;
        list-style: none;
    }

    .nav-item1 {
        position: relative;
    }

    .nav-link1 {
        font-size: 1.1rem;
        font-weight: 500;
        color: #fff; /* White text */
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .nav-link1:hover {
        color: rgb(0, 255, 0); /* Green hover color */
    }

    /* Profile Dropdown */
    .profile-dropdown {
        position: relative;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .profile-img {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .username {
        font-size: 1.1rem;
        font-weight: 500;
        color: #fff;
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
        width: 150px;
    }

    .profile-dropdown.active .dropdown-menu {
        display: flex;
    }

    .dropdown-menu li {
        list-style: none;
    }

    .dropdown-menu a {
        color: #fff;
        text-decoration: none;
        font-size: 1rem;
        transition: color 0.3s ease;
    }

    .dropdown-menu a:hover {
        color: #28a745;
    }

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
        background: #fff; /* White bars */
        transition: all 0.3s ease-in-out;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hamburger {
            display: block;
        }

        .nav-menu1 {
            position: fixed;
            left: -100%;
            top: 70px;
            flex-direction: column;
            background: rgba(0, 0, 0, 0.9); /* Dark background for mobile menu */
            backdrop-filter: blur(10px);
            width: 100%;
            text-align: center;
            transition: 0.3s;
            gap: 0;
            padding: 1rem 0;
        }

        .nav-item1 {
            margin: 1.5rem 0;
        }

        .nav-menu1.active {
            left: 0;
        }

        .hamburger.active .bar:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active .bar:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .hamburger.active .bar:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        .profile-dropdown {
            margin: 1.5rem 0;
        }

        .dropdown-menu {
            position: static;
            background: rgba(81, 79, 79, 0.7);
            width: 100%;
        }
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
<script>
    // Toggle mobile menu
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu1");

    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    });

    // Close mobile menu when a link is clicked
    document.querySelectorAll(".nav-link1").forEach(link => {
        link.addEventListener("click", () => {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        });
    });

    // Profile dropdown functionality
    const profileDropdown = document.querySelector(".profile-dropdown");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    if (profileDropdown) {
        profileDropdown.addEventListener("click", (e) => {
            e.stopPropagation(); // Prevent event from bubbling up
            profileDropdown.classList.toggle("active");
        });
    }

    // Close dropdown when clicking outside
    document.addEventListener("click", (e) => {
        if (profileDropdown && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.remove("active");
        }
    });
</script>