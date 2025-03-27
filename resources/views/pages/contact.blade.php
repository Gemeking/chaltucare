@extends('layouts.app')

@section('content')
<div class="contact-container">
    <!-- Hero Section -->
    <div class="contact-hero">
        <div class="hero-content">
            <h1><i class="fas fa-envelope"></i> Contact Our Team</h1>
            <p>We're here to help and answer any questions you might have</p>
        </div>
    </div>

    <!-- Contact Grid -->
    <div class="contact-grid">
        <!-- Contact Form -->
        <div class="contact-form-container">
            <div class="form-header">
                <h2>Send Us a Message</h2>
                <p>Fill out the form below and our team will get back to you within 24 hours</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" required class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <select id="subject" name="subject" required class="form-control">
                        <option value="">Select a subject</option>
                        <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                        <option value="Appointment Help" {{ old('subject') == 'Appointment Help' ? 'selected' : '' }}>Appointment Help</option>
                        <option value="Technical Support" {{ old('subject') == 'Technical Support' ? 'selected' : '' }}>Technical Support</option>
                        <option value="Feedback" {{ old('subject') == 'Feedback' ? 'selected' : '' }}>Feedback</option>
                        <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Your Message *</label>
                    <textarea id="message" name="message" rows="6" required class="form-control">{{ old('message') }}</textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </div>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="contact-info-container">
            <div class="info-card">
                <div class="info-header">
                    <h2>Contact Information</h2>
                    <p>Reach out through any of these channels</p>
                </div>

                <div class="info-items">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Our Location</h3>
                            <p>123 Healthcare Avenue<br>Medical District, Addis Ababa 1000<br>Ethiopia</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Phone Numbers</h3>
                            <p>+251 123 456 789<br>+251 987 654 321</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email Addresses</h3>
                            <p>info@healthconnect.com<br>support@healthconnect.com</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h3>Working Hours</h3>
                            <p>Monday - Friday: 8:00 AM - 6:00 PM<br>Saturday: 9:00 AM - 2:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                </div>

                <div class="social-links">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-icon instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.923853693115!2d38.76395031478615!3d8.980980193549312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b85f3e9453f4d%3A0x9e4b5b5b5b5b5b5b!2sAddis%20Ababa%2C%20Ethiopia!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
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

    .contact-container {
        max-width: 1400px;
        margin: 0 auto;
        color: var(--text-color);
    }

    /* Hero Section */
    .contact-hero {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 80px 20px;
        text-align: center;
        margin-bottom: 50px;
    }

    .contact-hero h1 {
        font-size: 2.5rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }

    .contact-hero p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin: 0;
    }

    /* Contact Grid */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        padding: 0 20px;
        margin-bottom: 50px;
    }

    @media (max-width: 1024px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Contact Form */
    .contact-form-container {
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 30px;
        box-shadow: var(--card-shadow);
    }

    .form-header {
        margin-bottom: 30px;
    }

    .form-header h2 {
        font-size: 1.8rem;
        margin-bottom: 10px;
        color: var(--primary-color);
    }

    .form-header p {
        color: var(--text-light);
        margin: 0;
    }

    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 480px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }

    .form-group label {
        font-weight: 500;
        color: var(--text-color);
    }

    .form-control {
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 6px;
        background-color: var(--bg-light);
        color: var(--text-color);
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 150px;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23718096' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 12px;
    }

    .form-actions {
        margin-top: 10px;
    }

    .btn-submit {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 500;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: var(--primary-dark);
    }

    /* Alerts */
    .alert {
        padding: 15px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .alert-success {
        background-color: rgba(56, 161, 105, 0.1);
        border-left: 4px solid var(--success-color);
        color: var(--success-color);
    }

    .alert-danger {
        background-color: rgba(229, 62, 62, 0.1);
        border-left: 4px solid var(--danger-color);
        color: var(--danger-color);
    }

    .alert-danger ul {
        margin: 10px 0 0 0;
        padding-left: 20px;
    }

    /* Contact Info */
    .contact-info-container {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .info-card {
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 30px;
        box-shadow: var(--card-shadow);
        height: 100%;
    }

    .info-header {
        margin-bottom: 30px;
    }

    .info-header h2 {
        font-size: 1.8rem;
        margin-bottom: 10px;
        color: var(--primary-color);
    }

    .info-header p {
        color: var(--text-light);
        margin: 0;
    }

    .info-items {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .info-item {
        display: flex;
        gap: 20px;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background-color: rgba(49, 130, 206, 0.1);
        color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .info-content h3 {
        font-size: 1.1rem;
        margin: 0 0 5px 0;
    }

    .info-content p {
        margin: 0;
        color: var(--text-light);
        line-height: 1.5;
    }

    .social-links {
        margin-top: 40px;
    }

    .social-links h3 {
        font-size: 1.1rem;
        margin-bottom: 15px;
    }

    .social-icons {
        display: flex;
        gap: 15px;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
        transition: transform 0.3s ease;
    }

    .social-icon:hover {
        transform: translateY(-3px);
    }

    .facebook {
        background-color: #3b5998;
    }

    .twitter {
        background-color: #1da1f2;
    }

    .linkedin {
        background-color: #0077b5;
    }

    .instagram {
        background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
    }

    /* Map Section */
    .map-container {
        width: 100%;
        margin-bottom: -5px; /* Removes small gap below iframe */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                const x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
            });
        }
    });
</script>
@endsection