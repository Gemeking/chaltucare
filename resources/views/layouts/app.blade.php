<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Website</title>
</head>
<body>
    <!-- Include the navbar -->

    <!-- Main content -->
    @include('components.header')
    <div class="container">
        @yield('content')
    </div>

    <!-- Include the footer -->
    @include('components.footer')
</body>
<style>
.container{
    background: linear-gradient(135deg, #A7E4FF, #6FA3EF, #5D4E8E);
}
</style>
</html>