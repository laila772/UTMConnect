<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UTMConnect+')</title>

    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/templatemo-tiya-golf-club.css') }}">
    <link rel="stylesheet" href="css/dashboard.css">


</head>
<body>
    {{-- <header>
        <div class="navbar">
            <a href="{{ url('/') }}" class="logo">UTMConnect+</a>
             <nav>
                <ul>
                    <li><a href="{{ url('/upcoming') }}">Upcoming Events</a></li>
                    <li><a href="{{ url('/latest') }}">Latest News</a></li>
                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                </ul>
            </nav> 
        </div>
    </header> --}}

    <main class="content">
        @yield('content')
    </main>

    {{-- <footer>
        <p>&copy; 2025 UTMConnect+. All rights reserved.</p>
    </footer> --}}

    <!-- JAVASCRIPT FILES -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/click-scroll.js') }}"></script>
<script src="{{ asset('js/animated-headline.js') }}"></script>
<script src="{{ asset('js/modernizr.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
