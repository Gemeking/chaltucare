@extends('layouts.app')

@section('content')
@include('components.header')
    <section class="main">
        <div class="profile-edit-section">
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
            <!-- Add more countries as needed -->
        </select>
    </div>

    <div class="form-group">
        <label for="social_links">Social Links</label>
        <input type="text" id="social_links" name="social_links" placeholder="Enter social media links separated by commas">
    </div>

    <button type="submit" class="submit-btn">Update Profile</button>
</form>
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

        .profile-edit-section {
            margin: 50px 5%;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-edit-section h2 {
            font-size: 40px;
            color: #fff;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 18px;
            color: #ddd;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #333;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .current-profile-pic {
            margin-top: 10px;
            max-width: 100px;
            border-radius: 50%;
        }

        .submit-btn {
            padding: 10px 50px;
            font-size: 20px;
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
            .profile-edit-section {
                margin: 20px 5%;
                padding: 15px;
            }

            .profile-edit-section h2 {
                font-size: 30px;
            }

            .form-group label {
                font-size: 16px;
            }

            .form-group input,
            .form-group textarea,
            .form-group select {
                font-size: 14px;
            }

            .submit-btn {
                font-size: 18px;
                padding: 12px 40px;
            }
        }
    </style>
@endsection