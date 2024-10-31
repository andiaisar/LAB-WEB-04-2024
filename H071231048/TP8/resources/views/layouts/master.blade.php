<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAFEYA - @yield('title')</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .navbar {
            background-color: #ffab02;
            padding: 5px;
            color: white;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .footer {
            background-color: #ffab02;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        
        .content {
            margin-bottom: 100px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">CAFEYA</a>
            <div class="nav-links">
                @component('components.nav-button', ['route' => 'home'])
                    Home
                @endcomponent
                
                @component('components.nav-button', ['route' => 'about'])
                    About
                @endcomponent
                
                @component('components.nav-button', ['route' => 'contact'])
                    Contact
                @endcomponent
            </div>
        </div>
    </nav>

    <div class="container content">
        @yield('content')
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} CAFEYA. All rights reserved.</p>
    </footer>
</body>
</html>