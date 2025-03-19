@extends('layouts.app')

@section('content')
@include('components.header')
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
    </section>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        .main {
            min-height: 100vh;
            width: auto;
            padding: 20px 0;
            color: #fff;
        }

        .main-section {
            display: flex;
            justify-content: space-between;
            margin: 30px 0 0 0;
        }

        .greenBox,
        .yellowBox {
            position: absolute;
            right: 10px;
        }

        .greenBox {
            width: 35%;
            bottom: 30px;
        }

        .yellowBox {
            width: 30%;
            bottom: 50px;
        }

        .doctor {
            position: absolute;
            right: 10px;
            bottom: 0;
            height: 90%;
        }

        .left-content {
            margin-left: 5%;
            position: relative;
            width: 50%;
        }

        h1 {
            font-size: 70px;
            color: #fff;
        }

        p {
            font-size: 20px;
            color: #ddd;
            margin: 10px 0;
        }

        .stethoscope {
            position: absolute;
            width: 80%;
            top: -2px;
            right: -20%;
            z-index: -1;
        }

        .bottomAngle {
            margin: 0 0 0 95%;
        }

        .mouse {
            margin: 40px 0 0 100%;
            height: 40px;
            width: 40px;
        }

        .right-content-btn {
            padding: 10px 50px;
            margin: 20px 0 0 0;
            font-size: 25px;
            font-weight: 600;
            color: #fff;
            background-color: #28a745;
            border: transparent;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .right-content-btn:hover {
            background-color: #218838;
        }

        /* Additional Content Styles */
        .additional-content {
            margin: 50px 5%;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .additional-content h2 {
            font-size: 40px;
            color: #fff;
            margin-bottom: 20px;
        }

        .additional-content .platform-name {
            color: #28a745;
        }

        .additional-content .intro {
            font-size: 18px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .additional-content h3 {
            font-size: 28px;
            color: #28a745;
            margin: 20px 0 10px;
        }

        .additional-content ul {
            list-style: none;
            padding: 0;
        }

        .additional-content ul li {
            font-size: 18px;
            color: #ddd;
            margin: 10px 0;
            padding-left: 20px;
            position: relative;
        }

        .additional-content ul li::before {
            content: "✔";
            color: #28a745;
            position: absolute;
            left: 0;
        }

        .additional-content ul li strong {
            color: #fff;
        }

        .cta-btn {
            padding: 15px 50px;
            margin: 20px 0 0 0;
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            background-color: #28a745;
            border: transparent;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .cta-btn:hover {
            background-color: #218838;
        }

        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {
            .main {
                height: auto;
                padding: 10px 0;
            }

            .main-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
                margin: 10px 0;
            }

            .left-content {
                width: 90%;
                margin-left: 0;
            }

            h1 {
                font-size: 40px;
            }

            p {
                font-size: 16px;
            }

            .right-content {
                display: none;
            }

            .stethoscope {
                display: none;
            }

            .bottomAngle,
            .TopAngle,
            .mouse {
                display: none;
            }
            

            .right-content-btn {
                font-size: 20px;
                padding: 10px 30px;
                margin: 10px 0;
            }

            .additional-content {
                margin: 20px 5%;
                padding: 15px;
            }

            .additional-content h2 {
                font-size: 30px;
            }

            .additional-content h3 {
                font-size: 24px;
            }

            .additional-content ul li {
                font-size: 16px;
            }

            .cta-btn {
                font-size: 18px;
                padding: 12px 40px;
            }
        }
    </style>
@endsection