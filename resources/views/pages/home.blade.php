@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* CSS Variables */
    :root {
        /* Light Mode Defaults */
        --primary: #3182CE;
        --secondary: #2C5282;
        --accent: #38B2AC;
        --background: #FFFFFF;
        --card-bg: #FFFFFF;
        --text: #2D3748;
        --light-text: #FFFFFF;
        --shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    /* Dark Mode Overrides */
    body.dark-mode {
        --primary: #63B3ED;
        --secondary: #4299E1;
        --accent: #4FD1C5;
        --background: #1A202C;
        --card-bg: #2D3748;
        --text: #E2E8F0;
        --shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    /* Main container styling */
    .main {
        background: var(--background);
        padding: 20px 0;
        overflow: hidden;
        transition: var(--transition);
    }

    /* Hero section styling */
    .main-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .left-content {
        flex: 1;
        padding-right: 40px;
        position: relative;
    }

    .left-content h1 {
        font-size: 42px;
        color: var(--text);
        margin-bottom: 20px;
        line-height: 1.3;
        transform: translateY(20px);
        opacity: 0;
        transition: transform 0.8s ease, opacity 0.8s ease, color var(--transition);
    }

    .left-content p {
        font-size: 16px;
        color: var(--text);
        opacity: 0.8;
        margin-bottom: 30px;
        line-height: 1.6;
        transform: translateY(20px);
        opacity: 0;
        transition: transform 0.8s ease 0.2s, opacity 0.8s ease 0.2s, color var(--transition);
    }

    .left-content .TopAngle {
        position: absolute;
        top: -15px;
        left: -15px;
        transform: scale(0.8);
        opacity: 0;
        transition: transform 0.8s ease, opacity 0.8s ease;
    }

    .left-content .stethoscope {
        position: absolute;
        left: 100px;
        bottom: -30px;
        width: 120px;
        transform: rotate(-30deg) scale(0.8);
        opacity: 0;
        transition: transform 1s ease 0.4s, opacity 1s ease 0.4s;
    }

    .left-content .bottomAngle {
        position: absolute;
        bottom: -20px;
        right: 100px;
        transform: scale(0.8);
        opacity: 0;
        transition: transform 0.8s ease 0.6s, opacity 0.8s ease 0.6s;
    }

    .left-content .mouse {
        position: absolute;
        bottom: -40px;
        left: 50%;
        transform: translateX(-50%) scale(0.8);
        opacity: 0;
        transition: transform 0.8s ease 0.8s, opacity 0.8s ease 0.8s;
    }

    .right-content {
        flex: 1;
        position: relative;
        height: 500px;
    }

    .right-content .greenBox {
        position: absolute;
        top: 50px;
        right: 50px;
        width: 400px;
        transform: scale(0.8);
        opacity: 0;
        transition: transform 1s ease 0.2s, opacity 1s ease 0.2s;
    }

    .right-content .yellowBox {
        position: absolute;
        top: 100px;
        right: 100px;
        width: 400px;
        transform: scale(0.8);
        opacity: 0;
        transition: transform 1s ease 0.4s, opacity 1s ease 0.4s;
    }

    .right-content .doctor {
        position: absolute;
        top: 50px;
        right: 50px;
        height: 500px;
        transform: translateY(50px);
        opacity: 0;
        transition: transform 1s ease 0.6s, opacity 1s ease 0.6s;
    }

    /* Button styling */
    .right-content-btn {
        display: inline-block;
        background: var(--primary);
        color: var(--light-text);
        padding: 12px 25px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 15px;
        transform: scale(0.95);
        opacity: 0;
        transition: transform 0.8s ease 0.8s, opacity 0.8s ease 0.8s, background var(--transition);
    }

    .right-content-btn:hover {
        background: var(--secondary);
        transform: scale(1.05);
    }

    /* Content wrapper animation */
    .content-wrapper {
        display: flex;
        gap: 30px;
        justify-content: center;
        align-items: flex-start;
        margin: 10px auto;
        padding: 0 20px;
    }

    /* Additional content styling */
    .additional-content {
        flex: 1;
        background: var(--card-bg);
        padding: 40px;
        border-radius: 12px;
        box-shadow: var(--shadow);
        transform: translateY(30px);
        opacity: 0;
        transition: transform 0.8s ease, opacity 0.8s ease, background var(--transition), box-shadow var(--transition);
    }

    .additional-content h2 {
        color: var(--text);
        margin-bottom: 20px;
        font-size: 32px;
        transform: translateY(20px);
        opacity: 0;
        transition: transform 0.8s ease, opacity 0.8s ease, color var(--transition);
    }

    .additional-content .platform-name {
        color: var(--primary);
        font-weight: bold;
        transition: color var(--transition);
    }

    .additional-content p.intro {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 25px;
        color: var(--text);
        opacity: 0.8;
        transform: translateY(20px);
        opacity: 0;
        transition: transform 0.8s ease 0.2s, opacity 0.8s ease 0.2s, color var(--transition);
    }

    .additional-content h3 {
        color: var(--text);
        margin: 25px 0 15px;
        font-size: 24px;
        transform: translateY(20px);
        opacity: 0;
        transition: transform 0.8s ease 0.3s, opacity 0.8s ease 0.3s, color var(--transition);
    }

    .additional-content ul {
        padding-left: 20px;
        margin-bottom: 25px;
    }

    .additional-content li {
        margin-bottom: 12px;
        line-height: 1.5;
        color: var(--text);
        opacity: 0.8;
        transform: translateX(-20px);
        opacity: 0;
        transition: transform 0.6s ease, opacity 0.6s ease, color var(--transition);
    }

    .additional-content li:nth-child(1) { transition-delay: 0.4s; }
    .additional-content li:nth-child(2) { transition-delay: 0.5s; }
    .additional-content li:nth-child(3) { transition-delay: 0.6s; }
    .additional-content li:nth-child(4) { transition-delay: 0.7s; }
    .additional-content li:nth-child(5) { transition-delay: 0.8s; }

    /* Side content styling */
    .sidecontent {
        width: 100%;
        max-width: 350px;
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: var(--shadow);
        transform: translateY(30px);
        opacity: 0;
        transition: transform 0.8s ease 0.3s, opacity 0.8s ease 0.3s, background var(--transition), box-shadow var(--transition);
    }

    /* Animation classes */
    .visible {
        opacity: 1 !important;
        transform: translate(0) scale(1) rotate(0) !important;
    }

    /* Floating animation for doctor image */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }

    /* Pulse animation for green box */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }

    /* Theme Toggle Button */
    .theme-toggle {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--light-text);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: var(--shadow);
        z-index: 100;
        transition: var(--transition);
        border: none;
        outline: none;
    }

    .theme-toggle:hover {
        transform: scale(1.1);
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .main-section {
            flex-direction: column;
            text-align: center;
        }

        .left-content {
            padding-right: 0;
            margin-bottom: 40px;
        }

        .right-content {
            height: 400px;
        }

        .content-wrapper {
            flex-direction: column;
            align-items: center;
        }

        .sidecontent {
            max-width: 100%;
            margin-top: 40px;
        }
    }

    @media (max-width: 768px) {
        .left-content h1 {
            font-size: 32px;
        }

        .right-content {
            height: 300px;
        }

        .right-content .doctor {
            height: 350px;
        }

        .additional-content {
            padding: 25px;
        }

        .additional-content h2 {
            font-size: 28px;
        }

        .additional-content h3 {
            font-size: 22px;
        }
    }

    @media (max-width: 480px) {
        .left-content h1 {
            font-size: 28px;
        }

        .right-content {
            height: 250px;
        }

        .right-content .doctor {
            height: 300px;
        }

        .additional-content {
            padding: 20px;
        }
    }
</style>

<section class="main">
    <div class="main-section">
        <div class="left-content">
            <img src="images/source-topAngle.png" alt="topAngle" class="TopAngle">
            <h1>Complete Health Care Solutions for Everyone</h1>
            <p>We're always available for our Patients with emergen problems. You can easily reach us 24/7. We focus on providing the highest quality care.</p>
            <img src="images/source-stethoscope.png" alt="stethoscope" class="stethoscope">
            <a href="{{ url('/loginandsignup') }}" class="right-content-btn">Make Appointment</a>
            <img src="images/source-bottomAngle.png" alt="bottomAngle" class="bottomAngle">
            <img src="images/source-mouse.png" alt="mouse" class="mouse">
        </div>
        <div class="right-content">
            <img src="images/source-greenBox.png" alt="greenBox" class="greenBox">
            <img src="images/source-yellowBox.png" alt="yellowBox" class="yellowBox">
            <img src="images/source-doctor.png" alt="doctor" class="doctor">
        </div>
    </div>

    <!-- Additional Content Section -->
    <div class="content-wrapper">
        <div class="additional-content">
            <h2>Welcome to <span class="platform-name">HealthConnect</span></h2>
            <p class="intro">Hello! I'm Dr. Chaltu Regassa, a graduate of Gondar University, Ethiopia, and I'm here to provide professional and compassionate online health counseling.</p>
            <div class="features">
                <h3>Our platform offers:</h3>
                <ul>
                    <li>✔ <strong>Live Chat Support</strong> – Get instant answers to your health concerns.</li>
                    <li>✔ <strong>Video Consultations</strong> – Speak face-to-face with a doctor from the comfort of your home.</li>
                    <li>✔ <strong>Confidential & Secure Services</strong> – Your privacy is our priority.</li>
                    <li>✔ <strong>24/7 Availability</strong> – Access healthcare services anytime, anywhere.</li>
                    <li>✔ <strong>Personalized Care</strong> – Tailored health plans to meet your unique needs.</li>
                </ul>
            </div>
            <div class="benefits">
                <h3>Why Choose Us?</h3>
                <ul>
                    <li>🌟 Experienced and certified healthcare professionals.</li>
                    <li>🌟 Affordable and transparent pricing.</li>
                    <li>🌟 Easy-to-use platform with seamless navigation.</li>
                    <li>🌟 Fast and reliable service with no waiting times.</li>
                </ul>
            </div>
            <a href="{{ url('/loginandsignup') }}" class="right-content-btn">Make Appointment</a>
        </div>
        @include('components.sidecontent') 
    </div>

    <!-- Theme Toggle Button -->
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>
</section>

<script>
    // Theme Toggle Functionality
    function toggleTheme() {
        document.body.classList.toggle('dark-mode');
        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
        
        const icon = document.querySelector('.theme-toggle i');
        if (isDarkMode) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
    }

    // Check for saved theme preference on page load
    document.addEventListener('DOMContentLoaded', function() {
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-mode');
            const icon = document.querySelector('.theme-toggle i');
            if (icon) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
        }
        
        // Initialize all animations
        function initAnimations() {
            // Hero section elements
            const heroElements = [
                document.querySelector('.left-content h1'),
                document.querySelector('.left-content p'),
                document.querySelector('.TopAngle'),
                document.querySelector('.stethoscope'),
                document.querySelector('.bottomAngle'),
                document.querySelector('.mouse'),
                document.querySelector('.greenBox'),
                document.querySelector('.yellowBox'),
                document.querySelector('.doctor'),
                document.querySelector('.left-content .right-content-btn')
            ];

            // Additional content elements
            const additionalContent = document.querySelector('.additional-content');
            const sideContent = document.querySelector('.sidecontent');
            const contentItems = [
                additionalContent,
                additionalContent.querySelector('h2'),
                additionalContent.querySelector('p.intro'),
                additionalContent.querySelector('.features h3'),
                ...additionalContent.querySelectorAll('.features li'),
                additionalContent.querySelector('.benefits h3'),
                ...additionalContent.querySelectorAll('.benefits li'),
                additionalContent.querySelector('.right-content-btn'),
                sideContent
            ];

            // Create intersection observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        
                        // Add special animations
                        if (entry.target.classList.contains('doctor')) {
                            entry.target.style.animation = 'float 4s ease-in-out infinite';
                        }
                        if (entry.target.classList.contains('greenBox')) {
                            entry.target.style.animation = 'pulse 5s ease-in-out infinite';
                        }
                        
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            });

            // Observe all elements
            [...heroElements, ...contentItems].forEach(el => {
                if (el) observer.observe(el);
            });

            // Fallback for older browsers
            if (!window.IntersectionObserver) {
                const elements = document.querySelectorAll('[class*="animate-"], .additional-content, .sidecontent');
                
                function checkVisibility() {
                    elements.forEach(element => {
                        const elementTop = element.getBoundingClientRect().top;
                        const windowHeight = window.innerHeight;
                        
                        if (elementTop < windowHeight - 100) {
                            element.classList.add('visible');
                        }
                    });
                }
                
                window.addEventListener('scroll', checkVisibility);
                checkVisibility(); // Initial check
            }
        }

        // Initialize animations when page loads
        initAnimations();
    });
</script>
@endsection