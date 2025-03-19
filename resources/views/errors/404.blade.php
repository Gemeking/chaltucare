@extends('layouts.app')

@section('content')
    <section class="error-page">
        <div class="tv-effect">
            <div class="scanlines"></div>
            <div class="noise"></div>
            <div class="ball"></div>
        </div>
        <div class="error-content">
            <h1>404</h1>
            <h2>Oops! Page Not Found</h2>
            <p>It seems like the page you're looking for doesn't exist. Don't worry, we're here to help!</p>
            <a href="{{ url('/') }}" class="home-btn">Go Back Home</a>
        </div>
    </section>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: #1a1a1a;
            color: #fff;
            overflow: hidden;
        }

        .error-page {
            position: relative;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: radial-gradient(circle, #0a0a0a, #000);
        }

        .tv-effect {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
            overflow: hidden;
        }

        .scanlines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                transparent,
                transparent 2px,
                rgba(255, 255, 255, 0.05) 3px
            );
            animation: scan 5s linear infinite;
        }

        @keyframes scan {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(100%);
            }
        }

        .noise {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.6' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            opacity: 0.3;
            z-index: 2;
        }

        .ball {
            position: absolute;
            width: 50px;
            height: 50px;
            background: #28a745;
            border-radius: 50%;
            animation: bounce 8s infinite ease-in-out;
            z-index: 3;
        }

        @keyframes bounce {
            0% {
                transform: translate(0, 0);
            }
            25% {
                transform: translate(calc(100vw - 60px), calc(100vh - 60px));
            }
            50% {
                transform: translate(calc(100vw - 60px), 0);
            }
            75% {
                transform: translate(0, calc(100vh - 60px));
            }
            100% {
                transform: translate(0, 0);
            }
        }

        .error-content {
            position: relative;
            z-index: 4;
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 120px;
            color: #28a745;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 40px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #ddd;
            margin-bottom: 30px;
        }

        .home-btn {
            padding: 10px 30px;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        .home-btn:hover {
            background-color: #218838;
        }

        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {
            h1 {
                font-size: 80px;
            }

            h2 {
                font-size: 30px;
            }

            p {
                font-size: 16px;
            }

            .home-btn {
                font-size: 16px;
                padding: 8px 20px;
            }
        }
    </style>
@endsection