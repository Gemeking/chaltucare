@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="welcome-section">
        <h1>Welcome to <span class="brand">ChaltuCare</span></h1>
        <p class="subtitle">Your trusted healthcare management platform</p>
        
        <div class="features">
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="feature-text">
                    <h3>Expert Doctors</h3>
                    <p>Access to qualified medical professionals</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="feature-text">
                    <h3>Easy Scheduling</h3>
                    <p>Book appointments with ease</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="feature-text">
                    <h3>Secure Data</h3>
                    <p>Your health information is protected</p>
                </div>
            </div>
        </div>
    </div>

    <div class="auth-card">
        <div class="auth-tabs">
            <input type="radio" id="login-tab" name="auth-tab" checked>
            <input type="radio" id="signup-tab" name="auth-tab">
            
            <div class="tab-labels">
                <label for="login-tab" class="login-label">Login</label>
                <label for="signup-tab" class="signup-label">Sign Up</label>
                <div class="active-indicator"></div>
            </div>
            
            <div class="tab-content">
                <div class="login-form">
                    <form>
                        <div class="form-group">
                            <label for="login-email">Email Address</label>
                            <input type="email" id="login-email" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="login-password">Password</label>
                            <input type="password" id="login-password" placeholder="Enter your password" required>
                            <a href="#" class="forgot-password">Forgot password?</a>
                        </div>
                        
                        <button type="submit" class="auth-btn">
                            <span class="btn-text">Login</span>
                            <div class="btn-overlay"></div>
                        </button>
                        
                        <div class="social-auth">
                            <div class="divider">
                                <span>or continue with</span>
                            </div>
                            
                            <div class="social-buttons">
                                <button type="button" class="social-btn google-btn">
                                    <i class="fab fa-google"></i> Google
                                </button>
                                <button type="button" class="social-btn apple-btn">
                                    <i class="fab fa-apple"></i> Apple
                                </button>
                            </div>
                        </div>
                        
                        <div class="auth-footer">
                            Don't have an account? <a href="#" class="switch-tab" data-tab="signup-tab">Sign up</a>
                        </div>
                    </form>
                </div>
                
                <div class="signup-form">
                    <form>
                        <div class="form-group">
                            <label for="signup-name">Full Name</label>
                            <input type="text" id="signup-name" placeholder="Enter your full name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="signup-email">Email Address</label>
                            <input type="email" id="signup-email" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="signup-password">Password</label>
                            <input type="password" id="signup-password" placeholder="Create a password" required>
                            <small class="password-hint">Minimum 8 characters</small>
                        </div>
                        
                        <div class="form-group">
                            <label for="signup-confirm-password">Confirm Password</label>
                            <input type="password" id="signup-confirm-password" placeholder="Confirm your password" required>
                        </div>
                        
                        <div class="form-group terms-group">
                            <input type="checkbox" id="terms-agree" required>
                            <label for="terms-agree">I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a></label>
                        </div>
                        
                        <button type="submit" class="auth-btn">
                            <span class="btn-text">Create Account</span>
                            <div class="btn-overlay"></div>
                        </button>
                        
                        <div class="social-auth">
                            <div class="divider">
                                <span>or sign up with</span>
                            </div>
                            
                            <div class="social-buttons">
                                <button type="button" class="social-btn google-btn">
                                    <i class="fab fa-google"></i> Google
                                </button>
                                <button type="button" class="social-btn apple-btn">
                                    <i class="fab fa-apple"></i> Apple
                                </button>
                            </div>
                        </div>
                        
                        <div class="auth-footer">
                            Already have an account? <a href="#" class="switch-tab" data-tab="login-tab">Sign in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        /* Light Theme */
        --primary: #4f46e5;
        --primary-light: #6366f1;
        --primary-dark: #4338ca;
        --secondary: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --info: #3b82f6;
        --teal: #14b8a6;
        --purple: #8b5cf6;
        --pink: #ec4899;
        --orange: #f97316;
        --google-blue: #4285F4;
        --apple-black: #000000;
        
        /* Text Colors */
        --text-primary: #1e293b;
        --text-secondary: #64748b;
        --text-muted: #94a3b8;
        
        /* Backgrounds */
        --bg-primary: #ffffff;
        --bg-secondary: #f8fafc;
        --bg-tertiary: #e2e8f0;
        
        /* Borders */
        --border-color: #e2e8f0;
        
        /* Shadows */
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        
        /* Transition */
        --transition: all 0.3s ease;
    }

    .dark-mode {
        /* Dark Theme */
        --primary: #6366f1;
        --primary-light: #818cf8;
        --primary-dark: #4f46e5;
        --secondary: #10b981;
        --danger: #ef4444;
        --warning: #f59e0b;
        --info: #3b82f6;
        --google-blue: #4285F4;
        --apple-black: #ffffff;
        
        /* Text Colors */
        --text-primary: #f8fafc;
        --text-secondary: #e2e8f0;
        --text-muted: #94a3b8;
        
        /* Backgrounds */
        --bg-primary: #0f172a;
        --bg-secondary: #1e293b;
        --bg-tertiary: #334155;
        
        /* Borders */
        --border-color: #334155;
    }

    .auth-container {
        display: flex;
        min-height: 100vh;
        padding: 2rem;
        background-color: var(--bg-secondary);
        color: var(--text-primary);
        transition: var(--transition);
    }

    .welcome-section {
        flex: 1;
        padding: 4rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .welcome-section h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .welcome-section .brand {
        color: var(--primary);
    }

    .welcome-section .subtitle {
        font-size: 1.1rem;
        color: var(--text-secondary);
        margin-bottom: 3rem;
    }

    .features {
        margin-top: 3rem;
    }

    .feature {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        background-color: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.2rem;
    }

    .feature-text h3 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: var(--text-primary);
    }

    .feature-text p {
        color: var(--text-secondary);
        font-size: 0.95rem;
    }

    .auth-card {
        width: 100%;
        max-width: 680px;
        background-color: var(--bg-primary);
        border-radius: 12px;
        box-shadow: var(--shadow-lg);
        padding: 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .auth-tabs {
        width: 100%;
    }

    .tab-labels {
        position: relative;
        display: flex;
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border-color);
    }

    .tab-labels label {
        flex: 1;
        text-align: center;
        padding: 1rem 0;
        font-weight: 600;
        color: var(--text-secondary);
        cursor: pointer;
        transition: var(--transition);
        position: relative;
        z-index: 2;
    }

    .tab-labels .active-indicator {
        position: absolute;
        bottom: -1px;
        left: 0;
        height: 3px;
        width: 50%;
        background-color: var(--primary);
        transition: var(--transition);
        z-index: 1;
    }

    #signup-tab:checked ~ .tab-labels .active-indicator {
        transform: translateX(100%);
    }

    #signup-tab:checked ~ .tab-labels .login-label {
        color: var(--text-secondary);
    }

    #signup-tab:checked ~ .tab-labels .signup-label {
        color: var(--primary);
    }

    #login-tab:checked ~ .tab-labels .login-label {
        color: var(--primary);
    }

    #login-tab:checked ~ .tab-labels .signup-label {
        color: var(--text-secondary);
    }

    .tab-content {
        position: relative;
        overflow: hidden;
    }

    .login-form, .signup-form {
        transition: var(--transition);
    }

    #signup-tab:checked ~ .tab-content .login-form {
        transform: translateX(-100%);
        opacity: 0;
        position: absolute;
        pointer-events: none;
    }

    #login-tab:checked ~ .tab-content .signup-form {
        transform: translateX(100%);
        opacity: 0;
        position: absolute;
        pointer-events: none;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--text-primary);
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        background-color: var(--bg-primary);
        color: var(--text-primary);
        transition: var(--transition);
        font-size: 1rem;
    }

    .form-group input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
    }

    .form-group input::placeholder {
        color: var(--text-muted);
    }

    .forgot-password {
        display: inline-block;
        margin-top: 0.5rem;
        font-size: 0.9rem;
        color: var(--primary);
        text-decoration: none;
        transition: var(--transition);
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .password-hint {
        display: block;
        margin-top: 0.25rem;
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .terms-group {
    display: flex;
    align-items: center;
    gap: 0.5rem; /* Modern gap property for consistent spacing */
    margin-bottom: 1.5rem;
    flex-wrap: nowrap; /* Prevent wrapping */
}

.terms-group input[type="checkbox"] {
    margin: 0; /* Remove default margins */
    width: auto; /* Don't let it stretch */
    flex-shrink: 0; /* Prevent shrinking */
}

.terms-group label {
    display: inline-flex; /* Keep inline behavior */
    align-items: center;
    gap: 0.25rem;
    margin: 0;
    font-size: 0.9rem;
    cursor: pointer;
    white-space: nowrap; /* Prevent text wrapping */
}

.terms-group a {
    white-space: nowrap;
    color: var(--primary);
    text-decoration: none;
    transition: var(--transition);
}

.terms-group a:hover {
    text-decoration: underline;
}

/* Responsive fallback for very small screens */
@media (max-width: 400px) {
    .terms-group {
        flex-wrap: wrap;
    }
    .terms-group label {
        white-space: normal;
    }
}

    .auth-btn {
        position: relative;
        width: 100%;
        padding: 0.75rem;
        border-radius: 8px;
        background-color: var(--primary);
        color: white;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        overflow: hidden;
        transition: var(--transition);
    }

    .auth-btn .btn-overlay {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: var(--transition);
    }

    .auth-btn:hover .btn-overlay {
        left: 100%;
    }

    .divider {
        display: flex;
        align-items: center;
        margin: 1.5rem 0;
        color: var(--text-secondary);
    }

    .divider::before, .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background-color: var(--border-color);
    }

    .divider span {
        padding: 0 1rem;
        font-size: 0.9rem;
    }

    .social-buttons {
        display: flex;
        gap: 1rem;
    }

    .social-btn {
        flex: 1;
        padding: 0.75rem;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        font-size: 0.95rem;
        cursor: pointer;
        transition: var(--transition);
        border: 1px solid var(--border-color);
    }

    .social-btn i {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .google-btn {
        background-color: var(--bg-secondary);
        color: var(--text-primary);
    }

    .google-btn:hover {
        background-color: var(--bg-tertiary);
    }

    .apple-btn {
        background-color: var(--apple-black);
        color: white;
    }

    .apple-btn:hover {
        opacity: 0.9;
    }

    .auth-footer {
        text-align: center;
        margin-top: 1.5rem;
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    .auth-footer a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
        .auth-container {
            flex-direction: column;
            align-items: center;
            padding: 1rem;
        }

        .welcome-section {
            padding: 2rem;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
        }

        .feature {
            flex: 1;
            min-width: 200px;
            margin-bottom: 0;
        }

        .auth-card {
            max-width: 100%;
            margin-top: 2rem;
        }
    }

    @media (max-width: 768px) {
        .welcome-section h1 {
            font-size: 2rem;
        }

        .feature {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .feature-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }

        .social-buttons {
            flex-direction: column;
        }
    }

    @media (max-width: 480px) {
        .auth-card {
            padding: 1.5rem;
        }

        .tab-labels label {
            padding: 0.75rem 0;
            font-size: 0.9rem;
        }
    }
</style>

<script>
    // Tab switching functionality
    document.querySelectorAll('.switch-tab').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId).checked = true;
            
            // Trigger change event to update UI
            const event = new Event('change');
            document.getElementById(tabId).dispatchEvent(event);
        });
    });

    // Form submission
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formType = this.classList.contains('login-form') ? 'Login' : 'Sign Up';
            alert(`${formType} functionality would be implemented here`);
        });
    });

    // Social buttons
    document.querySelectorAll('.social-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const provider = this.classList.contains('google-btn') ? 'Google' : 'Apple';
            alert(`${provider} authentication would be implemented here`);
        });
    });

    // Password confirmation validation
    const signupPassword = document.getElementById('signup-password');
    const signupConfirmPassword = document.getElementById('signup-confirm-password');
    
    if (signupPassword && signupConfirmPassword) {
        signupConfirmPassword.addEventListener('input', function() {
            if (signupPassword.value !== signupConfirmPassword.value) {
                this.setCustomValidity("Passwords don't match");
            } else {
                this.setCustomValidity('');
            }
        });
    }

    // Theme adaptation
    function checkSystemTheme() {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.body.classList.add('dark-mode');
        }
    }

    // Check on page load
    document.addEventListener('DOMContentLoaded', function() {
        checkSystemTheme();
        
        // Watch for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (e.matches) {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.remove('dark-mode');
            }
        });
    });
</script>
@endsection