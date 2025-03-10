<footer class="footer">
    <div class="footer-content">
        <!-- Footer Logo and Description -->
        <div class="footer-section">
            <div class="logo">
                <img src="{{ asset('logo.png') }}" alt="HealthEase Logo">
                <span>HealthEase</span>
            </div>
            <p class="footer-description">
                Your trusted partner in online health counseling. We provide personalized care to help you achieve your health goals.
            </p>
        </div>

        <!-- Quick Links -->
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </div>

        <!-- Contact Information -->
        <div class="footer-section">
            <h3>Contact Us</h3>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> 123 Health St, Wellness City</li>
                <li><i class="fas fa-phone"></i> +123 456 7890</li>
                <li><i class="fas fa-envelope"></i> info@healthease.com</li>
            </ul>
        </div>

        <!-- Social Media Links -->
        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} HealthEase. All rights reserved.</p>
    </div>
</footer>
<style>
/* Footer Styles */
.footer {
    background-color: #2c3e50;
    color: #fff;
    padding: 2rem 0;
    margin-top: auto; /* Push footer to the bottom */
}

.footer-content {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    flex-wrap: wrap;
    gap: 2rem;
}

.footer-section {
    flex: 1;
    min-width: 200px;
}

.footer-section h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: #fff;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 0.5rem;
}

.footer-section ul li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: #482ff7;
}

.footer-section .social-links {
    display: flex;
    gap: 1rem;
}

.footer-section .social-links a {
    color: #fff;
    font-size: 1.2rem;
    transition: color 0.3s ease;
}

.footer-section .social-links a:hover {
    color: #482ff7;
}

.footer-bottom {
    text-align: center;
    padding: 1rem 0;
    border-top: 1px solid #444;
    margin-top: 2rem;
}

.footer-bottom p {
    margin: 0;
    font-size: 0.9rem;
}

/* Logo in Footer */
.logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo img {
    height: 40px;
    width: auto;
}

.logo span {
    font-size: 1.5rem;
    font-weight: 600;
    color: #fff;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
}
</style>