@extends('layouts.app')

@section('title', 'Blog - HealthEase')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaltu Care - Online Health Counseling</title>
    <link rel="stylesheet" href="styles.css">
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
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
}

main {
    padding: 20px;
}

.blog-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.blog-post {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.blog-post h2 {
    margin-top: 0;
}

.blog-post img {
    max-width: 100%;
    border-radius: 8px;
}

.tags {
    font-style: italic;
    color: #555;
}

.meta {
    font-size: 0.9em;
    color: #777;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>
@endsection