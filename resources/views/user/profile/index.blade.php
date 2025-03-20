@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Profile Setting</h1>

    <!-- Profile Information Section -->
    <div class="profile-section">
      <!-- Profile Picture -->
      <div class="profile-image">
        <img id="profilePicture" src="{{ asset('images/default-profile.png') }}" alt="Profile Picture" onclick="openImagePopup(this.src)">
        <input type="file" id="profilePictureInput" accept="image/*" style="display: none;">
        <button onclick="document.getElementById('profilePictureInput').click()">Change Profile Picture</button>
      </div>

      <!-- Profile Details Form -->
      <div class="profile-details">
        <form id="profileForm">
          <!-- Full Name -->
          <label for="full_name">Full Name:</label>
          <input type="text" id="full_name" name="full_name" value="John Doe">

          <!-- Bio -->
          <label for="bio">Bio:</label>
          <textarea id="bio" name="bio" rows="4">Software Engineer | Tech Enthusiast</textarea>

          <!-- Email (Read-only) -->
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" value="john.doe@example.com" readonly>

          <!-- Username (Read-only) -->
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" value="johndoe123" readonly>

          <!-- Save Button -->
          <button type="submit">Save Changes</button>
        </form>
      </div>
    </div>

    <!-- Change Password Section -->
    <div class="change-password-section">
      <h2>Change Password</h2>
      <form id="changePasswordForm">
        <!-- Current Password -->
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password" required>

        <!-- New Password -->
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>

        <!-- Confirm New Password -->
        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <!-- Submit Button -->
        <button type="submit">Change Password</button>
      </form>
    </div>

    <!-- Profile Picture Pop-up -->
    <div id="imagePopup" class="image-popup">
      <span class="close-popup" onclick="closeImagePopup()">&times;</span>
      <img id="popupImage" src="" alt="Enlarged Profile Picture">
    </div>
  </div>

  <style>
    /* Light Theme (Default) */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 20px auto;
      background: #fff;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
      color: #28a745;
    }

    .profile-section {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .profile-image {
      text-align: center;
    }

    .profile-image img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #28a745;
      cursor: pointer;
    }

    .profile-image button {
      margin-top: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    .profile-image button:hover {
      background-color: #218838;
    }

    .profile-details, .change-password-section {
      flex: 1;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: bold;
    }

    input, textarea, button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    textarea {
      resize: vertical;
    }

    button[type="submit"] {
      background-color: #28a745;
      color: white;
      border: none;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #218838;
    }

    /* Dark Theme */
    body.dark-theme {
      background-color: #121212;
      color: #ffffff;
    }

    .dark-theme .container {
      background-color: #1f1f1f;
      color: #ffffff;
    }

    .dark-theme h1, .dark-theme h2 {
      color: #4caf50;
    }

    .dark-theme input, .dark-theme textarea, .dark-theme button {
      background-color: #333;
      color: #ffffff;
      border-color: #555;
    }

    .dark-theme .profile-image img {
      border-color: #4caf50;
    }

    .dark-theme .profile-image button {
      background-color: #4caf50;
    }

    .dark-theme button[type="submit"] {
      background-color: #4caf50;
    }

    .dark-theme button[type="submit"]:hover {
      background-color: #45a049;
    }

    /* Image Popup */
    .image-popup {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.9);
      text-align: center;
    }

    .image-popup img {
      max-width: 90%;
      max-height: 90%;
      margin-top: 5%;
    }

    .close-popup {
      position: absolute;
      top: 20px;
      right: 30px;
      color: white;
      font-size: 40px;
      font-weight: bold;
      cursor: pointer;
    }

    .close-popup:hover {
      color: #ccc;
    }

    /* Mobile Responsiveness */
    @media (min-width: 768px) {
      .profile-section {
        flex-direction: row;
      }
    }
  </style>

  <script>
    // Theme Toggle Logic
    const themeToggle = document.getElementById("theme-toggle");
    const body = document.body;

    // Check localStorage for theme preference
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
      body.classList.add("dark-theme");
    }

    // Profile Picture Upload
    const profilePictureInput = document.getElementById("profilePictureInput");
    const profilePicture = document.getElementById("profilePicture");

    profilePictureInput.addEventListener("change", (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          profilePicture.src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    });

    // Profile Form Submission
    const profileForm = document.getElementById("profileForm");
    profileForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const fullName = document.getElementById("full_name").value;
      const bio = document.getElementById("bio").value;

      // Simulate saving changes (Replace with actual API call)
      alert(`Profile Updated:\nFull Name: ${fullName}\nBio: ${bio}`);
    });

    // Change Password Form Submission
    const changePasswordForm = document.getElementById("changePasswordForm");
    changePasswordForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const currentPassword = document.getElementById("current_password").value;
      const newPassword = document.getElementById("new_password").value;
      const confirmPassword = document.getElementById("confirm_password").value;

      if (newPassword !== confirmPassword) {
        alert("New passwords do not match!");
        return;
      }

      // Simulate password change (Replace with actual API call)
      alert("Password changed successfully!");
    });

    // Image Popup Logic
    function openImagePopup(src) {
      const popup = document.getElementById("imagePopup");
      const popupImage = document.getElementById("popupImage");
      popupImage.src = src;
      popup.style.display = "block";
    }

    function closeImagePopup() {
      const popup = document.getElementById("imagePopup");
      popup.style.display = "none";
    }
  </script>
@endsection