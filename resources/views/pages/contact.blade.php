@extends('layouts.app')

@section('title', 'Contact Us - HealthEase')

@section('content')
@include('components.header')
    <section class="contact-hero">
        <div class="contact-container">
            <h1>Contact Us</h1>
            <p>We're here to help! Reach out to us for any questions or concerns.</p>

            <!-- Contact Information -->
            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Our Office</h3>
                    <p>123 Health St, Wellness City</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <h3>Call Us</h3>
                    <p>+123 456 7890</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <h3>Email Us</h3>
                    <p>info@healthease.com</p>
                </div>
            </div>

            <!-- Contact Form -->
            <form id="contact-form" class="contact-form" action="{{ url('/contact') }}" method="POST">
                @csrf <!-- CSRF token for security -->

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Message -->
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-button">Send Message</button>
            </form>

            <!-- Map Integration -->
            <div class="map-container">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.123456789012!2d44.0680972893742!3d9.554097661296588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMzMnMTQuNyJOIDQ0wrAwNCcwNS4xIkU!5e0!3m2!1sen!2sus!4v1633023226784!5m2!1sen!2sus"
        width="100%"
        height="400"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
    ></iframe>
</div>
        </div>
    </section>
    <style>
    /* Contact Hero Section */
.contact-hero {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 4rem 2rem;
    background: #f4f7f6;
}

.contact-container {
    background: white;
    padding: 2.5rem;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    max-width: 1000px;
    width: 100%;
    animation: fadeIn 1s ease-in-out;
}

.contact-container h1 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 1rem;
    text-align: center;
}

.contact-container p {
    font-size: 1.1rem;
    color: #666;
    text-align: center;
    margin-bottom: 2rem;
}

/* Contact Information */
.contact-info {
    display: flex;
    justify-content: space-between;
    gap: 2rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.info-item {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    flex: 1;
    min-width: 200px;
    transition: transform 0.3s ease;
}

.info-item:hover {
    transform: translateY(-10px);
}

.info-item i {
    font-size: 2rem;
    color: #482ff7;
    margin-bottom: 1rem;
}

.info-item h3 {
    font-size: 1.5rem;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

.info-item p {
    font-size: 1rem;
    color: #666;
}

/* Contact Form */
.contact-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-group label {
    font-size: 1rem;
    color: #2c3e50;
    font-weight: 500;
}

.form-group input,
.form-group textarea {
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #482ff7;
    outline: none;
}

.form-group textarea {
    resize: vertical;
}

/* Submit Button */
.submit-button {
    background: #482ff7;
    color: white;
    padding: 0.8rem;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
}

.submit-button:hover {
    background: #371fbf;
}

/* Map Container */
.map-container {
    margin-top: 2rem;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
    </style>
    <script>
    document.getElementById('contact-form').addEventListener('submit', function (e) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Simple validation
    if (!name || !email || !message) {
        e.preventDefault(); // Prevent form submission
        alert('Please fill out all fields.');
    }
});
    </script>
@endsection