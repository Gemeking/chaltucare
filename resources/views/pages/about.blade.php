@extends('layouts.app')
@include('components.header')

@section('title', 'About Us - HealthEase')

@section('content')
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>About Us</h1>
            <p>Your trusted partner in online health counseling. We are dedicated to helping you achieve your health goals.</p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="mission-content">
            <h2>Our Mission</h2>
            <p>To provide accessible, personalized, and compassionate health counseling to individuals worldwide. We believe in empowering our clients to take control of their health and well-being.</p>
        </div>
        <div class="mission-image">
            <img src="{{ asset('images/missions/mission.jpg') }}" alt="Our Mission">
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <h2>Meet Our Team</h2>
        <div class="team-members">
            <div class="team-member">
                <img src="{{ asset('images/team1.jpg') }}" alt="Dr. John Doe">
                <h3>Dr. John Doe</h3>
                <p>Clinical Psychologist</p>
            </div>
            <div class="team-member">
                <img src="{{ asset('images/team2.jpg') }}" alt="Dr. Jane Smith">
                <h3>Dr. Jane Smith</h3>
                <p>Nutrition Specialist</p>
            </div>
            <div class="team-member">
                <img src="{{ asset('images/team3.jpg') }}" alt="Dr. Emily Brown">
                <h3>Dr. Emily Brown</h3>
                <p>Mental Health Counselor</p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <h2>Our Core Values</h2>
        <div class="values-list">
            <div class="value-item">
                <i class="fas fa-heart"></i>
                <h3>Compassion</h3>
                <p>We care deeply about our clients and their well-being.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-users"></i>
                <h3>Community</h3>
                <p>We believe in building a supportive and inclusive community.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-lightbulb"></i>
                <h3>Innovation</h3>
                <p>We use the latest tools and techniques to provide the best care.</p>
            </div>
        </div>
    </section>
    <style>
    /* About Hero Section */
.about-hero {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: white;
    padding: 100px 2rem;
    text-align: center;
}

.about-hero h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
    animation: fadeIn 2s ease-in-out;
}

.about-hero p {
    font-size: 1.2rem;
    animation: fadeIn 2.5s ease-in-out;
}

/* Mission Section */
.mission-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 4rem 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.mission-content {
    flex: 1;
    padding-right: 2rem;
}

.mission-content h2 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 1rem;
}

.mission-content p {
    font-size: 1.1rem;
    color: #666;
}

.mission-image img {
    max-width: 100%;
    border-radius: 10px;
    animation: float 3s ease-in-out infinite;
}

/* Team Section */
.team-section {
    background: #f4f7f6;
    padding: 4rem 2rem;
    text-align: center;
}

.team-section h2 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 2rem;
}

.team-members {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.team-member {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    width: 250px;
    transition: transform 0.3s ease;
}

.team-member:hover {
    transform: translateY(-10px);
}

.team-member img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 1rem;
}

.team-member h3 {
    font-size: 1.5rem;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.team-member p {
    font-size: 1rem;
    color: #666;
}

/* Values Section */
.values-section {
    padding: 4rem 2rem;
    text-align: center;
}

.values-section h2 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 2rem;
}

.values-list {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.value-item {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    width: 250px;
    transition: transform 0.3s ease;
}

.value-item:hover {
    transform: translateY(-10px);
}

.value-item i {
    font-size: 2rem;
    color: #482ff7;
    margin-bottom: 1rem;
}

.value-item h3 {
    font-size: 1.5rem;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.value-item p {
    font-size: 1rem;
    color: #666;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes float {
    0% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0); }
}
    </style>
@endsection