@extends('layouts.app')

@section('title', 'Blog - HealthEase')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaltu Care - Online Health Counseling</title>
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>
<body>
    <header>
        <h1>Chaltu Care</h1>
        <p>Online Health Counseling</p>
    </header>

    <main>
        <section class="blog-list">
            <article class="blog-post">
                <h2>Blog Title 1</h2>
                <img src="download.jpg" alt="Blog Image">
                <p>This is the content of the first blog post. It provides valuable health counseling information.</p>
                <div class="tags">Health, Wellness</div>
                <div class="meta">Posted on <time datetime="2023-10-01">October 1, 2023</time></div>
            </article>

            <article class="blog-post">
                <h2>Blog Title 2</h2>
                <img src="download.jpg" alt="Blog Image">
                <p>This is the content of the second blog post. It offers insights into mental health and well-being.</p>
                <div class="tags">Mental Health, Counseling</div>
                <div class="meta">Posted on <time datetime="2023-10-05">October 5, 2023</time></div>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Chaltu Care. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
@endsection