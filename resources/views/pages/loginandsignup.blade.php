@extends('layouts.app')
@include('components.header')
@section('content')

    <div class="wrapper">
    <div class="additional-content">
        <h2>Welcome to <span class="platform-name">Chaltu Care</span></h2>
    </div>
       <div class="title-text">
          <div class="title login">
             Login
          </div>
          <div class="title signup">
             Sign Up
          </div>
       </div>
       <div class="form-container">
          <div class="slide-controls">
             <input type="radio" name="slide" id="login" checked>
             <input type="radio" name="slide" id="signup">
             <label for="login" class="slide login">Login</label>
             <label for="signup" class="slide signup">Sign Up</label>
             <div class="slider-tab"></div>
          </div>
          <div class="form-inner">
             <form action="#" class="login">
                <div class="field">
                   <input type="text" placeholder="Email Address" required>
                </div>
                <div class="field">
                   <input type="password" placeholder="Password" required>
                </div>
                <div class="pass-link">
                   <a href="#">Forgot password?</a>
                </div>
                <div class="field btn">
                   <div class="btn-layer"></div>
                   <input type="submit" value="Login">
                </div>
                <div class="signup-link">
                   Don't have an account? <a href="">Sign up now</a>
                </div>
             </form>
             <form action="#" class="signup">
                <div class="field">
                   <input type="text" placeholder="Email Address" required>
                </div>
                <div class="field">
                   <input type="password" placeholder="Password" required>
                </div>
                <div class="field">
                   <input type="password" placeholder="Confirm Password" required>
                </div>
                <div class="field btn">
                   <div class="btn-layer"></div>
                   <input type="submit" value="Sign Up">
                </div>
             </form>
          </div>
       </div>
    </div>
    
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");

        signupBtn.onclick = () => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        };

        loginBtn.onclick = () => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        };

        signupLink.onclick = () => {
            signupBtn.click();
            return false;
        };
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Raleway', sans-serif;
        }

        body {
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .wrapper {
            overflow: hidden;
            max-width: 390px;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.2);
        }

        .wrapper .title-text {
            display: flex;
            width: 200%;
        }

        .wrapper .title {
            width: 50%;
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            color: #fff;
        }

        .wrapper .slide-controls {
            position: relative;
            display: flex;
            height: 50px;
            width: 100%;
            overflow: hidden;
            margin: 30px 0 10px 0;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .slide-controls .slide {
            height: 100%;
            width: 100%;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            line-height: 48px;
            cursor: pointer;
            z-index: 1;
            transition: all 0.6s ease;
        }

        .slide-controls label.signup {
            color: #fff;
        }

        .slide-controls .slider-tab {
            position: absolute;
            height: 100%;
            width: 50%;
            left: 0;
            z-index: 0;
            border-radius: 5px;
            background: linear-gradient(135deg, #28a745, #218838);
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        input[type="radio"] {
            display: none;
        }

        #signup:checked ~ .slider-tab {
            left: 50%;
        }

        #signup:checked ~ label.signup {
            color: #fff;
            cursor: default;
            user-select: none;
        }

        #signup:checked ~ label.login {
            color: #fff;
        }

        #login:checked ~ label.signup {
            color: #fff;
        }

        #login:checked ~ label.login {
            cursor: default;
            user-select: none;
        }

        .wrapper .form-container {
            width: 100%;
            overflow: hidden;
        }

        .form-container .form-inner {
            display: flex;
            width: 200%;
        }

        .form-container .form-inner form {
            width: 50%;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .form-inner form .field {
            height: 50px;
            width: 100%;
            margin-top: 20px;
        }

        .form-inner form .field input {
            height: 100%;
            width: 100%;
            outline: none;
            padding-left: 15px;
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 17px;
            transition: all 0.3s ease;
        }

        .form-inner form .field input:focus {
            border-color: #28a745;
        }

        .form-inner form .field input::placeholder {
            color: #ccc;
        }

        .form-inner form .pass-link {
            margin-top: 5px;
        }

        .form-inner form .signup-link {
            text-align: center;
            margin-top: 30px;
        }

        .form-inner form .pass-link a,
        .form-inner form .signup-link a {
            color: #28a745;
            text-decoration: none;
        }

        .form-inner form .pass-link a:hover,
        .form-inner form .signup-link a:hover {
            text-decoration: underline;
        }

        form .btn {
            height: 50px;
            width: 100%;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }

        form .btn .btn-layer {
            height: 100%;
            width: 300%;
            position: absolute;
            left: -100%;
            background: linear-gradient(135deg, #28a745, #218838);
            border-radius: 5px;
            transition: all 0.4s ease;
        }

        form .btn:hover .btn-layer {
            left: 0;
        }

        form .btn input[type="submit"] {
            height: 100%;
            width: 100%;
            z-index: 2;
            position: relative;
            background: none;
            border: none;
            color: #fff;
            padding-left: 0;
            border-radius: 10px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
        }

        /* Additional Content Styles */
        .additional-content {
            margin-top: 50px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        .additional-content h2 {
            font-size: 40px;
            color: #fff;
            margin-bottom: 20px;
        }

        .additional-content .platform-name {
            color: #28a745;
        }

        .additional-content .intro {
            font-size: 18px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .additional-content h3 {
            font-size: 28px;
            color: #28a745;
            margin: 20px 0 10px;
        }

        .additional-content ul {
            list-style: none;
            padding: 0;
        }

        .additional-content ul li {
            font-size: 18px;
            color: #ddd;
            margin: 10px 0;
            padding-left: 20px;
            position: relative;
        }

        .additional-content ul li::before {
            content: "✔";
            color: #28a745;
            position: absolute;
            left: 0;
        }

        .additional-content ul li strong {
            color: #fff;
        }

        .cta-btn {
            padding: 15px 50px;
            margin: 20px 0 0 0;
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            background-color: #28a745;
            border: transparent;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .cta-btn:hover {
            background-color: #218838;
        }

        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {
            .wrapper {
                padding: 20px;
            }

            .additional-content {
                padding: 15px;
            }

            .additional-content h2 {
                font-size: 30px;
            }

            .additional-content h3 {
                font-size: 24px;
            }

            .additional-content ul li {
                font-size: 16px;
            }

            .cta-btn {
                font-size: 18px;
                padding: 12px 40px;
            }
        }
    </style>
@endsection