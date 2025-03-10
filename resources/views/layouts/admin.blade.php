<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Website</title>
    <style>
        /* Define the container class */
        .container {
            padding-top: 80px; /* Add padding to account for the fixed navbar */
        }
    </style>
</head>
<body>
    <!-- Include the navbar -->
    @include('components.navbar')

    <!-- Main content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Include the footer -->
    @include('components.footer')
</body>
</html>