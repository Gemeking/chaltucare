@extends('layouts.app')

@section('content')
@include('components.header')
    <section class="main">
        <div class="profile-container">
            <!-- View Profile Section (Left) -->
            <div class="view-profile">
                <div class="profile-header">
                    <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture">
                    <h2 class="profile-name">John Doe</h2>
                    <div class="edit-icon" onclick="toggleEditForm()">
                        <i class="fas fa-edit"></i>
                    </div>
                </div>
                <div class="profile-details">
                    <p><strong>Bio:</strong> Passionate about health and wellness.</p>
                    <p><strong>Phone:</strong> +123 456 7890</p>
                    <p><strong>Address:</strong> 123 Main St, City, Country</p>
                    <p><strong>Social Links:</strong> 
                        <a href="#" class="social-link">Twitter</a>, 
                        <a href="#" class="social-link">LinkedIn</a>
                    </p>
                </div>
            </div>

            <!-- Edit Profile Section (Right) -->
            <div class="edit-profile">
                <h2>Edit Profile</h2>
                <form action="{{ url('/update-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" id="profile_picture" name="profile_picture">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio" rows="4" placeholder="Tell us about yourself"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter your address">
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" name="country">
                            <option value="">Select Country</option>
                            <option value="USA">United States</option>
                            <option value="Canada">Canada</option>
                            <option value="UK">United Kingdom</option>
                            <option value="Australia">Australia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="social_links">Social Links</label>
                        <input type="text" id="social_links" name="social_links" placeholder="Enter social media links separated by commas">
                    </div>

                    <button type="submit" class="submit-btn">Update Profile</button>
                </form>
            </div>
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
            background: linear-gradient(135deg, #6b6810, #2045ff);
            min-height: 100vh;
            width: auto;
            padding: 20px 0;
            color: #fff;
        }

        .profile-container {
            display: flex;
            margin: 50px 5%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .view-profile {
            width: 25%;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .profile-header {
            text-align: center;
            position: relative;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 2px solid #28a745;
        }

        .profile-name {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .edit-icon {
            position: absolute;
            top: 0;
            right: 0;
            background: #28a745;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .edit-icon:hover {
            background: #218838;
            transform: rotate(15deg) scale(1.1);
        }

        .profile-details {
            margin-top: 20px;
        }

        .profile-details p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .social-link {
            color: #28a745;
            text-decoration: none;
            margin-right: 5px;
        }

        .social-link:hover {
            text-decoration: underline;
        }

        .edit-profile {
            width: 75%;
            padding: 20px;
        }

        .edit-profile h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            color: #ddd;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            color: #333;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .submit-btn {
            padding: 10px 30px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background-color: #28a745;
            border: transparent;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #218838;
        }

        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
                margin: 20px 5%;
            }

            .view-profile,
            .edit-profile {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .edit-profile h2 {
                font-size: 24px;
            }

            .form-group label {
                font-size: 14px;
            }

            .form-group input,
            .form-group textarea,
            .form-group select {
                font-size: 12px;
            }

            .submit-btn {
                font-size: 14px;
                padding: 8px 20px;
            }
        }
    </style>

    <script>
        function toggleEditForm() {
            const editForm = document.querySelector('.edit-profile');
            editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>
@endsection