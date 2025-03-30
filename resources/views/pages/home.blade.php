@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="{{ asset('css/home/style.css') }}" rel="stylesheet">
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

    // Check for saved theme preference on page load
    document.addEventListener('DOMContentLoaded', function() {
        
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