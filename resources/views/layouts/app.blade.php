<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Variables for Theme */
        :root {
  /* Light Mode Defaults */
  --primary: #3182CE;
  --secondary: #2C5282;
  --background: #FFFFFF;
  --text: #2D3748;
  --accent: #38B2AC;
}

@media (prefers-color-scheme: dark) {
  :root {
    /* Dark Mode Overrides */
    --primary: #63B3ED;
    --secondary: #4299E1;
    --background: #1A202C;
    --text: #E2E8F0;
    --accent: #4FD1C5;
  }
}

/* Manual Toggle Support */
body.dark-mode {
  --primary: #63B3ED;
  --secondary: #4299E1;
  --background: #1A202C;
  --text: #E2E8F0;
  --accent: #4FD1C5;
}

body.light-mode {
  --primary: #3182CE;
  --secondary: #2C5282;
  --background: #FFFFFF;
  --text: #2D3748;
  --accent: #38B2AC;
}

/* Apply Variables */
body {
  background: var(--background);
  color: var(--text);
}

.header {
  background: var(--primary);
  color: white;
}

.button {
  background: var(--accent);
  color: white;
}
        :root {
            --primary-color: #482ff7;
            --secondary-color: #2a2a72;
            --accent-color: #4bcffa;
            --text-color: #2d3436;
            --light-text: #f5f6fa;
            --background-color: #ffffff;
            --container-bg: #ffffff;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        body.dark-mode {
            --background-color: #121212;
            --container-bg: #1e1e1e;
            --text-color: #f5f6fa;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        body {
            background: var(--background-color);
            color: var(--text-color);
            transition: background 0.3s ease, color 0.3s ease;
        }

        .container {
            background: var(--container-bg);
            transition: background 0.3s ease;
        }

        /* Theme Toggle Styles */
        .theme-toggle {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow);
            z-index: 100;
            transition: all 0.3s ease;
            border: none;
            outline: none;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <!-- Include the navbar -->
    @include('components.header')
    
    <!-- Main content -->
    <div class="container">
        <br><br><br>
        @yield('content')
    </div>

    <!-- Include the footer -->
    @include('components.footer')

    <!-- Theme Toggle Button -->
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>

    <script>
        // Theme Toggle Functionality
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const isDarkMode = document.body.classList.contains('dark-mode');
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
            
            const icon = document.querySelector('.theme-toggle i');
            if (isDarkMode) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        }

        // Check for saved theme preference on page load
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
                const icon = document.querySelector('.theme-toggle i');
                if (icon) {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                }
            }
        });
    </script>
</body>
</html>