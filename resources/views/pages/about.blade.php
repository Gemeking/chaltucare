@extends('layouts.app')

@section('content')
<div class="about-container">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="hero-content">
            <h1><i class="fas fa-heartbeat"></i> Our Story, Your Health</h1>
            <p>Compassionate care powered by innovation and expertise</p>
        </div>
        <div class="hero-image">
            <div class="image-overlay"></div>
        </div>
    </section>

    <!-- Mission Statement -->
    <section class="mission-section">
        <div class="mission-card">
            <div class="mission-icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <h2>Our Mission</h2>
            <p>To revolutionize healthcare accessibility by combining cutting-edge technology with compassionate medical expertise, ensuring everyone receives personalized care when and where they need it.</p>
        </div>
    </section>

    <!-- Timeline -->
    <section class="timeline-section">
        <h2 class="section-title">Our Journey</h2>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-date">2015</div>
                <div class="timeline-content">
                    <h3>Foundation</h3>
                    <p>Founded by Dr. Sarah Johnson with a vision to make healthcare more accessible through technology.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">2017</div>
                <div class="timeline-content">
                    <h3>First Milestone</h3>
                    <p>Launched our telehealth platform serving 1,000 patients in the first year.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">2019</div>
                <div class="timeline-content">
                    <h3>National Recognition</h3>
                    <p>Awarded "Most Innovative Healthcare Startup" by the National Medical Association.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">2022</div>
                <div class="timeline-content">
                    <h3>Global Expansion</h3>
                    <p>Expanded our services to 5 countries with over 500 healthcare professionals on our platform.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-date">Today</div>
                <div class="timeline-content">
                    <h3>Continuing Innovation</h3>
                    <p>Serving millions of patients worldwide with our integrated healthcare ecosystem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <h2 class="section-title">Meet Our Leadership</h2>
        <p class="section-subtitle">Dedicated professionals committed to your health</p>
        
        <div class="team-grid">
            <div class="team-card">
                <div class="team-image" style="background-image: url('https://randomuser.me/api/portraits/women/63.jpg')">
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Dr. Sarah Johnson</h3>
                    <p class="position">Founder & CEO</p>
                    <p class="bio">Board-certified cardiologist with 15 years of clinical experience and a passion for healthcare innovation.</p>
                </div>
            </div>
            
            <div class="team-card">
                <div class="team-image" style="background-image: url('https://randomuser.me/api/portraits/men/42.jpg')">
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Dr. Michael Chen</h3>
                    <p class="position">Chief Medical Officer</p>
                    <p class="bio">Neurologist and healthcare technology expert leading our clinical quality initiatives.</p>
                </div>
            </div>
            
            <div class="team-card">
                <div class="team-image" style="background-image: url('https://randomuser.me/api/portraits/women/44.jpg')">
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>Amanda Rodriguez</h3>
                    <p class="position">Chief Technology Officer</p>
                    <p class="bio">Software engineer with a mission to build accessible healthcare platforms.</p>
                </div>
            </div>
            
            <div class="team-card">
                <div class="team-image" style="background-image: url('https://randomuser.me/api/portraits/men/75.jpg')">
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-info">
                    <h3>David Kim</h3>
                    <p class="position">Chief Operations Officer</p>
                    <p class="bio">Healthcare administrator with expertise in scaling medical services globally.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-number" data-count="250">0</div>
                <div class="stat-label">Healthcare Professionals</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-count="500000">0</div>
                <div class="stat-label">Patients Served</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-count="98">0</div>
                <div class="stat-label">Patient Satisfaction</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-count="15">0</div>
                <div class="stat-label">Countries</div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <h2 class="section-title">Our Core Values</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3>Patient-Centered Care</h3>
                <p>Every decision we make prioritizes the well-being and convenience of our patients.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Continuous Innovation</h3>
                <p>We constantly evolve to incorporate the latest medical and technological advancements.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h3>Compassionate Service</h3>
                <p>We treat every patient with the empathy and respect they deserve.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Integrity & Trust</h3>
                <p>We maintain the highest ethical standards in all our interactions.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2>Join Us in Revolutionizing Healthcare</h2>
            <p>Whether you're a healthcare provider or a patient, we'd love to connect with you.</p>
            <div class="cta-buttons">
                <a href="#" class="btn-primary">Become a Provider</a>
                <a href="#" class="btn-outline">Contact Us</a>
            </div>
        </div>
    </section>
</div>

<style>
    /* Base Styles */
    :root {
        --primary-color: #3182CE;
        --primary-dark: #2C5282;
        --success-color: #38A169;
        --warning-color: #DD6B20;
        --danger-color: #E53E3E;
        --text-color: #2D3748;
        --text-light: #718096;
        --bg-light: #F7FAFC;
        --border-color: #E2E8F0;
        --card-bg: #FFFFFF;
        --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .dark-mode {
        --text-color: #E2E8F0;
        --text-light: #A0AEC0;
        --bg-light: #1A202C;
        --border-color: #2D3748;
        --card-bg: #2D3748;
        --card-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .about-container {
        color: var(--text-color);
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Hero Section */
    .about-hero {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        margin-bottom: 80px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 600px;
        padding: 0 40px;
    }

    .hero-content h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .hero-content p {
        font-size: 1.2rem;
        color: white;
        opacity: 0.9;
        margin-bottom: 30px;
    }

    .hero-image {
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 100%;
        background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, var(--primary-dark) 0%, rgba(49,130,206,0.6) 100%);
    }

    /* Mission Section */
    .mission-section {
        max-width: 800px;
        margin: 0 auto 80px;
        padding: 0 20px;
    }

    .mission-card {
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 40px;
        text-align: center;
        box-shadow: var(--card-shadow);
    }

    .mission-icon {
        width: 80px;
        height: 80px;
        background-color: var(--primary-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 2rem;
    }

    .mission-card h2 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        color: var(--primary-color);
    }

    .mission-card p {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    /* Section Titles */
    .section-title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 15px;
        color: var(--primary-color);
    }

    .section-subtitle {
        text-align: center;
        font-size: 1.1rem;
        color: var(--text-light);
        max-width: 600px;
        margin: 0 auto 50px;
    }

    /* Timeline Section */
    .timeline-section {
        padding: 60px 20px;
        background-color: var(--bg-light);
        margin-bottom: 80px;
    }

    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        width: 4px;
        background-color: var(--primary-color);
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -2px;
    }

    .timeline-item {
        padding: 20px 40px;
        position: relative;
        width: 50%;
        box-sizing: border-box;
    }

    .timeline-item:nth-child(odd) {
        left: 0;
    }

    .timeline-item:nth-child(even) {
        left: 50%;
    }

    .timeline-date {
        background-color: var(--primary-color);
        color: white;
        border-radius: 20px;
        padding: 5px 15px;
        font-weight: 500;
        display: inline-block;
        margin-bottom: 15px;
    }

    .timeline-content {
        background-color: var(--card-bg);
        padding: 20px;
        border-radius: 8px;
        box-shadow: var(--card-shadow);
    }

    .timeline-content h3 {
        margin-top: 0;
        color: var(--primary-color);
    }

    .timeline-content p {
        margin-bottom: 0;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: white;
        border: 4px solid var(--primary-color);
        border-radius: 50%;
        top: 30px;
        z-index: 1;
    }

    .timeline-item:nth-child(odd)::after {
        right: -12px;
    }

    .timeline-item:nth-child(even)::after {
        left: -12px;
    }

    /* Team Section */
    .team-section {
        padding: 0 20px 80px;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .team-card {
        background-color: var(--card-bg);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: transform 0.3s ease;
    }

    .team-card:hover {
        transform: translateY(-10px);
    }

    .team-image {
        height: 300px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .social-links {
        position: absolute;
        bottom: 20px;
        left: 20px;
        display: flex;
        gap: 10px;
    }

    .social-links a {
        width: 35px;
        height: 35px;
        background-color: rgba(255,255,255,0.9);
        color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .social-links a:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .team-info {
        padding: 20px;
    }

    .team-info h3 {
        margin: 0 0 5px 0;
        font-size: 1.3rem;
    }

    .position {
        color: var(--primary-color);
        font-weight: 500;
        margin: 0 0 15px 0;
    }

    .bio {
        color: var(--text-light);
        margin: 0;
        line-height: 1.5;
    }

    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 80px 20px;
        margin-bottom: 80px;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        max-width: 1000px;
        margin: 0 auto;
        text-align: center;
    }

    .stat-number {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .stat-label {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    /* Values Section */
    .values-section {
        padding: 0 20px 80px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .value-card {
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        box-shadow: var(--card-shadow);
        transition: transform 0.3s ease;
    }

    .value-card:hover {
        transform: translateY(-5px);
    }

    .value-icon {
        width: 70px;
        height: 70px;
        background-color: rgba(49,130,206,0.1);
        color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 1.8rem;
    }

    .value-card h3 {
        margin: 0 0 15px 0;
        font-size: 1.3rem;
    }

    .value-card p {
        margin: 0;
        color: var(--text-light);
        line-height: 1.6;
    }

    /* CTA Section */
    .cta-section {
        background-color: var(--bg-light);
        padding: 80px 20px;
    }

    .cta-content {
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
    }

    .cta-content h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: var(--primary-color);
    }

    .cta-content p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        color: var(--text-light);
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 500;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
    }

    .btn-outline {
        background-color: transparent;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
        padding: 12px 25px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-outline:hover {
        background-color: rgba(49,130,206,0.1);
    }

    /* Responsive Adjustments */
    @media (max-width: 1024px) {
        .hero-content h1 {
            font-size: 2.5rem;
        }
        
        .hero-image {
            width: 50%;
        }
    }

    @media (max-width: 768px) {
        .about-hero {
            height: auto;
            flex-direction: column;
            padding: 60px 20px;
            text-align: center;
        }
        
        .hero-content {
            max-width: 100%;
            padding: 0;
            margin-bottom: 30px;
        }
        
        .hero-image {
            position: relative;
            width: 100%;
            height: 300px;
        }
        
        .timeline::before {
            left: 30px;
        }
        
        .timeline-item {
            width: 100%;
            padding-left: 70px;
            padding-right: 20px;
        }
        
        .timeline-item:nth-child(even) {
            left: 0;
        }
        
        .timeline-item::after {
            left: 20px !important;
        }
        
        .stats-container {
            grid-template-columns: 1fr 1fr;
        }
        
        .cta-buttons {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .hero-content h1 {
            font-size: 2rem;
        }
        
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .stat-number {
            font-size: 2.5rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate stats counting
        const statNumbers = document.querySelectorAll('.stat-number');
        
        const animateStats = () => {
            statNumbers.forEach(stat => {
                const target = parseInt(stat.getAttribute('data-count'));
                const suffix = stat.textContent.includes('%') ? '%' : '';
                const duration = 2000; // Animation duration in ms
                const step = target / (duration / 16); // 60fps
                
                let current = 0;
                const increment = () => {
                    current += step;
                    if (current < target) {
                        stat.textContent = Math.floor(current) + suffix;
                        requestAnimationFrame(increment);
                    } else {
                        stat.textContent = target + suffix;
                    }
                };
                
                increment();
            });
        };
        
        // Only animate when stats section is in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(document.querySelector('.stats-section'));
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
@endsection