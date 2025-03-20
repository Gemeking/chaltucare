@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
    <section class="main">
    <br></br></br>
        <div class="main-section">
            <div class="left-content">
                <img src="images/source-topAngle.png" alt="topAngle" height="30px" width="30px" class="TopAngle">
                <h1>Complete Health Care Solutions for Everyone</h1>
                <p>We're always available for our Patients with emergen problems. You can easily reach us 24/7. We focus on providing the highest quality care.</p>
                <img src="images/source-stethoscope.png" alt="stethoscope" class="stethoscope">
                <a href="{{ url('/loginandsignup') }}" class="right-content-btn">Make Appointment</a>
                <img src="images/source-bottomAngle.png" alt="bottomAngle" class="bottomAngle" height="30px" width="30px">
                <img src="images/source-mouse.png" alt="mouse" class="mouse" height="20px" width="20px">
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
        <p class="intro">Hello! I’m Dr. Chaltu Regassa, a graduate of Gondar University, Ethiopia, and I’m here to provide professional and compassionate online health counseling.</p>
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

    </section>

    
@endsection
<style>
.content-wrapper {
    display: flex; /* Enables side-by-side layout */
    gap: 20px; /* Adds spacing between the two sections */
    justify-content: center;
    align-items: flex-start;
    padding: 20px;
}

.additional-content {
    width: 80%; /* Takes 80% of the total width */
    background: #fff; /* Optional background */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.sidecontent {
    width: 100%; /* This will make it the reference width */
    max-width: 250px; /* Set max width for side content */
    background: #f8f9fa; /* Light background */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 999;
}

/* Make it responsive */
@media (max-width: 768px) {
    .content-wrapper {
        flex-direction: column; /* Stack on smaller screens */
        align-items: center;
    }
    
    .additional-content, .sidecontent {
        width: 100%;
    }
}

</style>