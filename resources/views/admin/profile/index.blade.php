@extends('layouts.app')

@section('content')
<!-- Add Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* CSS Variables for Light Mode */
    :root {
        --primary-color: #4f46e5;
        --secondary-color: #6366f1;
        --accent-color: #10b981;
        --background-color: #f8fafc;
        --card-bg: #ffffff;
        --text-color: #1e293b;
        --text-secondary: #64748b;
        --border-color: #e2e8f0;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    /* Dark Mode Overrides */
    body.dark-mode {
        --primary-color: #6366f1;
        --secondary-color: #818cf8;
        --accent-color: #10b981;
        --background-color: #0f172a;
        --card-bg: #1e293b;
        --text-color: #f8fafc;
        --text-secondary: #94a3b8;
        --border-color: #334155;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.25), 0 2px 4px -1px rgba(0, 0, 0, 0.15);
        --hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.25), 0 4px 6px -2px rgba(0, 0, 0, 0.15);
    }

    body {
        background-color: var(--background-color);
        color: var(--text-color);
        transition: background-color 0.5s ease, color 0.3s ease;
    }

    .profile-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .animate {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s forwards;
    }

    /* Profile Header */
    .profile-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .profile-header h1 {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-weight: 700;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }

    .profile-header p {
        color: var(--text-secondary);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Profile Grid Layout */
    .profile-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 992px) {
        .profile-grid {
            grid-template-columns: 1fr 2fr;
        }
    }

    /* Profile Cards */
    .profile-card {
        background: var(--card-bg);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
        margin-bottom: 2rem;
        border: 1px solid var(--border-color);
    }

    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--hover-shadow);
    }

    .profile-card h2 {
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        font-weight: 600;
        position: relative;
        padding-bottom: 0.8rem;
    }

    .profile-card h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        border-radius: 3px;
    }

    /* Profile Picture Section */
    .profile-picture-section {
        text-align: center;
        position: relative;
    }

    .profile-picture-container {
        position: relative;
        width: 180px;
        height: 180px;
        margin: 0 auto 1.5rem;
        border-radius: 50%;
        overflow: hidden;
        border: 5px solid var(--primary-color);
        box-shadow: 0 5px 25px rgba(79, 70, 229, 0.3);
        transition: var(--transition);
    }

    .profile-picture-container::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.3), rgba(16, 185, 129, 0.3));
        opacity: 0;
        transition: var(--transition);
        z-index: 1;
    }

    .profile-picture-container:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 30px rgba(79, 70, 229, 0.4);
    }

    .profile-picture-container:hover::before {
        opacity: 1;
    }

    .profile-picture {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .upload-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background: var(--primary-color);
        color: white;
        padding: 0.8rem 1.8rem;
        border-radius: 50px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        border: none;
        margin-top: 1rem;
        box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
    }

    .upload-btn:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(79, 70, 229, 0.3);
    }

    .profile-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 2.5rem;
        text-align: center;
    }

    .stat-item {
        padding: 0.5rem;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--text-secondary);
        margin-top: 0.3rem;
    }

    /* Social Links */
    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        justify-content: center;
    }

    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        transition: var(--transition);
        box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
    }

    .social-link:hover {
        background: var(--secondary-color);
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 6px 12px rgba(79, 70, 229, 0.3);
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--text-color);
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1.2rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 1rem;
        transition: var(--transition);
        background: var(--card-bg);
        color: var(--text-color);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .readonly-field {
        background-color: rgba(0, 0, 0, 0.05);
        color: var(--text-secondary);
        cursor: not-allowed;
    }

    .password-hint {
        color: var(--text-secondary);
        font-size: 0.8rem;
        margin-top: 0.3rem;
        display: block;
    }

    /* Buttons */
    .save-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: var(--transition);
        width: 100%;
        margin-top: 1rem;
        box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
    }

    .save-btn:hover {
        background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(79, 70, 229, 0.3);
    }

    /* Security Items */
    .security-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        padding: 0.8rem;
        background: rgba(79, 70, 229, 0.05);
        border-radius: 8px;
        color: var(--text-color);
        transition: var(--transition);
    }

    .security-item:hover {
        background: rgba(79, 70, 229, 0.1);
    }

    .security-item i {
        color: var(--primary-color);
        font-size: 1.2rem;
        width: 24px;
        text-align: center;
    }

    /* Time Slots */
    .time-slot {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.8rem;
        padding: 0.8rem;
        border-bottom: 1px solid var(--border-color);
        transition: var(--transition);
    }

    .time-slot:hover {
        background: rgba(79, 70, 229, 0.05);
        border-radius: 8px;
    }

    /* Image Popup */
    .image-popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(5px);
    }

    .popup-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        animation: fadeInUp 0.4s ease;
    }

    .popup-image {
        max-width: 100%;
        max-height: 80vh;
        border-radius: 8px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
    }

    .close-popup {
        position: absolute;
        top: -50px;
        right: 0;
        color: white;
        font-size: 2.5rem;
        cursor: pointer;
        transition: var(--transition);
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    }

    .close-popup:hover {
        color: var(--accent-color);
        transform: scale(1.1);
    }

    /* Theme Toggle */
    .theme-toggle {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        z-index: 100;
        transition: var(--transition);
        border: none;
        outline: none;
    }

    .theme-toggle:hover {
        transform: scale(1.1) rotate(30deg);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .theme-toggle i {
        font-size: 1.5rem;
        transition: var(--transition);
    }

    /* Toast Notifications */
    .toast {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        padding: 1rem 2rem;
        border-radius: 8px;
        color: white;
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease;
        transform: translate(-50%, 20px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .toast.show {
        opacity: 1;
        transform: translate(-50%, 0);
    }

    .toast-success {
        background: linear-gradient(135deg, var(--accent-color), #34d399);
    }

    .toast-error {
        background: linear-gradient(135deg, #ef4444, #f87171);
    }

    .toast i {
        font-size: 1.2rem;
    }

    /* Animation Delays */
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
    .delay-5 { animation-delay: 0.5s; }
    .delay-6 { animation-delay: 0.6s; }

    /* Floating Animation */
    .floating {
        animation: float 6s ease-in-out infinite;
    }
</style>

<div class="profile-container">
    <div class="profile-header animate delay-1">
        <h1>Profile Settings</h1>
        <p>Manage your personal information and account settings with ease</p>
    </div>

    <div class="profile-grid">
        <!-- Left Column -->
        <div class="left-column">
            <!-- Profile Picture Card -->
            <div class="profile-card profile-picture-section animate delay-2">
                <div class="profile-picture-container floating">
                    <img id="profilePicture" src="{{ asset('images/default-profile.png') }}" alt="Profile Picture" class="profile-picture" onclick="openImagePopup(this.src)">
                    <input type="file" id="profilePictureInput" accept="image/*" style="display: none;">
                </div>
                <button class="upload-btn" onclick="document.getElementById('profilePictureInput').click()">
                    <i class="fas fa-camera"></i> Change Photo
                </button>

                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-value">24</div>
                        <div class="stat-label">Sessions</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">3</div>
                        <div class="stat-label">Years</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">98%</div>
                        <div class="stat-label">Satisfaction</div>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Account Security Card -->
            <div class="profile-card animate delay-3">
                <h2>Account Security</h2>
                <div class="security-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Last login: 2 hours ago</span>
                </div>
                <div class="security-item">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Two-factor authentication: <strong>Enabled</strong></span>
                </div>
                <div class="security-item">
                    <i class="fas fa-envelope"></i>
                    <span>Email verified: <strong>Yes</strong></span>
                </div>
                <button class="save-btn" style="margin-top: 2rem;">
                    <i class="fas fa-lock"></i> Security Settings
                </button>
            </div>
        </div>

        <!-- Right Column -->
        <div class="right-column">
            <!-- Personal Information Card -->
            <div class="profile-card animate delay-4">
                <h2>Personal Information</h2>
                <form id="profileForm">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" value="Dr. Chaltu Regassa">
                    </div>

                    <div class="form-group">
                        <label for="profession">Profession</label>
                        <input type="text" id="profession" name="profession" class="form-control" value="Clinical Psychologist">
                    </div>

                    <div class="form-group">
                        <label for="bio">Professional Bio</label>
                        <textarea id="bio" name="bio" class="form-control">Licensed psychologist with 8 years of experience specializing in cognitive behavioral therapy. Committed to helping clients achieve mental wellness through evidence-based practices.</textarea>
                    </div>

                    <div class="form-group">
                        <label for="specialties">Specialties</label>
                        <input type="text" id="specialties" name="specialties" class="form-control" value="Anxiety, Depression, Relationship Issues">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control readonly-field" value="chaltu.regassa@example.com" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control" value="+251 912 345 678">
                    </div>

                    <button type="submit" class="save-btn">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </form>
            </div>

            <!-- Change Password Card -->
            <div class="profile-card password-form animate delay-5">
                <h2>Change Password</h2>
                <form id="changePasswordForm">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" id="current_password" name="current_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" required>
                        <small class="password-hint">Use 8 or more characters with a mix of letters, numbers & symbols</small>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                    </div>

                    <button type="submit" class="save-btn">
                        <i class="fas fa-key"></i> Update Password
                    </button>
                </form>
            </div>

            <!-- Availability Card -->
            <div class="profile-card animate delay-6">
                <h2>Availability Settings</h2>
                <div class="availability-settings">
                    <div class="form-group">
                        <label>Working Hours</label>
                        <div class="time-slots">
                            <div class="time-slot">
                                <span>Monday - Friday</span>
                                <span>9:00 AM - 5:00 PM</span>
                            </div>
                            <div class="time-slot">
                                <span>Saturday</span>
                                <span>10:00 AM - 2:00 PM</span>
                            </div>
                            <div class="time-slot">
                                <span>Sunday</span>
                                <span>Not Available</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="appointment_duration">Default Session Duration</label>
                        <select id="appointment_duration" class="form-control">
                            <option>30 minutes</option>
                            <option selected>45 minutes</option>
                            <option>60 minutes</option>
                            <option>90 minutes</option>
                        </select>
                    </div>

                    <button class="save-btn">
                        <i class="fas fa-calendar-alt"></i> Update Availability
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Popup -->
<div id="imagePopup" class="image-popup">
    <div class="popup-content">
        <span class="close-popup" onclick="closeImagePopup()">&times;</span>
        <img id="popupImage" src="" alt="Enlarged Profile Picture" class="popup-image">
    </div>
</div>

<!-- Theme Toggle Button -->
<button class="theme-toggle" onclick="toggleTheme()">
    <i class="fas fa-moon"></i>
</button>

<script>
    // Initialize animations
    document.addEventListener("DOMContentLoaded", function() {
        const animateElements = document.querySelectorAll('.animate');
        animateElements.forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.animation = 'fadeInUp 0.6s forwards';
        });
    });

    // Enhanced Theme Toggle with Smooth Transition
    function toggleTheme() {
        document.body.classList.toggle('dark-mode');
        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
        
        const icon = document.querySelector('.theme-toggle i');
        if (isDarkMode) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            // Add subtle animation when switching to dark mode
            document.body.style.transition = 'background-color 0.5s ease, color 0.3s ease';
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
        
        // Add temporary class for toggle animation
        const toggleBtn = document.querySelector('.theme-toggle');
        toggleBtn.classList.add('theme-toggling');
        setTimeout(() => {
            toggleBtn.classList.remove('theme-toggling');
        }, 500);
    }

    // Check for saved theme preference with system preference fallback
    function initializeTheme() {
        const savedTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
            document.body.classList.add('dark-mode');
            const icon = document.querySelector('.theme-toggle i');
            if (icon) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
        }
    }

    // Profile Picture Upload with Preview
    const profilePictureInput = document.getElementById('profilePictureInput');
    const profilePicture = document.getElementById('profilePicture');

    profilePictureInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            // Check if file is an image
            if (!file.type.match('image.*')) {
                showToast('Please select an image file', 'error');
                return;
            }
            
            // Check file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                showToast('Image size should be less than 2MB', 'error');
                return;
            }
            
            const reader = new FileReader();
            reader.onloadstart = function() {
                profilePicture.classList.add('uploading');
            };
            reader.onload = function(e) {
                profilePicture.src = e.target.result;
                profilePicture.classList.remove('uploading');
                showToast('Profile picture updated successfully!', 'success');
                
                // Add temporary animation
                profilePicture.parentElement.classList.add('upload-success');
                setTimeout(() => {
                    profilePicture.parentElement.classList.remove('upload-success');
                }, 1000);
            };
            reader.onerror = function() {
                showToast('Error loading image', 'error');
                profilePicture.classList.remove('uploading');
            };
            reader.readAsDataURL(file);
        }
    });

    // Profile Form Submission with Validation
    document.getElementById('profileForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simulate form submission
        setTimeout(() => {
            showToast('Profile information saved successfully!', 'success');
            
            // Add visual feedback
            const saveBtn = this.querySelector('.save-btn');
            saveBtn.innerHTML = '<i class="fas fa-check"></i> Saved!';
            saveBtn.style.backgroundColor = '#10b981';
            
            setTimeout(() => {
                saveBtn.innerHTML = '<i class="fas fa-save"></i> Save Changes';
                saveBtn.style.backgroundColor = '';
            }, 2000);
        }, 800);
    });

    // Password Form Submission with Enhanced Validation
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        
        if (newPassword.length < 8) {
            showToast('Password must be at least 8 characters', 'error');
            return;
        }
        
        if (newPassword !== confirmPassword) {
            showToast('Passwords do not match!', 'error');
            return;
        }
        
        // Simulate password change
        setTimeout(() => {
            showToast('Password changed successfully!', 'success');
            this.reset();
            
            // Add visual feedback
            const saveBtn = this.querySelector('.save-btn');
            saveBtn.innerHTML = '<i class="fas fa-check"></i> Updated!';
            saveBtn.style.background = 'linear-gradient(135deg, #10b981, #34d399)';
            
            setTimeout(() => {
                saveBtn.innerHTML = '<i class="fas fa-key"></i> Update Password';
                saveBtn.style.background = '';
            }, 2000);
        }, 800);
    });

    // Image Popup Functions with Enhanced UX
    function openImagePopup(src) {
        const popup = document.getElementById('imagePopup');
        const popupImage = document.getElementById('popupImage');
        popupImage.src = src;
        popup.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        // Add fade-in effect
        setTimeout(() => {
            popup.style.opacity = '1';
        }, 10);
    }

    function closeImagePopup() {
        const popup = document.getElementById('imagePopup');
        popup.style.opacity = '0';
        
        setTimeout(() => {
            popup.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Enhanced Toast Notification with Icons
    function showToast(message, type) {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        
        // Add appropriate icon
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        toast.innerHTML = `<i class="fas ${icon}"></i> ${message}`;
        
        document.body.appendChild(toast);
        
        // Show toast
        setTimeout(() => {
            toast.classList.add('show');
        }, 10);
        
        // Hide after delay
        setTimeout(() => {
            toast.classList.remove('show');
            
            // Remove after animation completes
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }

    // Close popup when clicking outside
    window.addEventListener('click', function(event) {
        const popup = document.getElementById('imagePopup');
        if (event.target === popup) {
            closeImagePopup();
        }
    });

    // Initialize theme on load
    initializeTheme();
</script>
@endsection