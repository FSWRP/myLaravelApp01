<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Blog System')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Prompt', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            position: relative;
            min-height: 100vh;
            z-index: 1;
            
        }
        .main-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .content {
            flex: 1;
            padding: 20px;
        }

        .navbar-custom {
            background-color: #ff9028c0;
            padding: 1rem 2rem;
            position: relative;
        }

        .navbar-custom .navbar-brand {
            color: #ffffff;
            display: flex;
            align-items: center;
            font-family: 'Prompt', sans-serif;
        }

        .navbar-custom .navbar-brand img {
            height: 70px; /* Adjust the height of the logo image */
            margin-right: 1rem;
        }

        .navbar-custom .navbar-nav .nav-link {
            font-size: 1rem;
            color: #ffffff;
        }

        .navbar-custom .navbar-nav .nav-link.active {
            color: #ffffff;
        }

        .date-time {
            position: absolute;
            right: 1rem;
            top: 0.5rem;
            color: #000000;
            font-size: 0.9rem;
            
        }
        .logo-divider {
            border-left: 2px solid #ffffff;
            height: 100px;
            margin-right: 1rem;
        }

        footer {
            background-color: #72a366;
            color: #ffffff;
            padding: 1rem 0;
            text-align: center;
        }

        .user-info {
            display: flex;
            align-items: center; /* Align items in the center vertically */
            font-size: 1.3rem; /* Adjust font size as needed */
            color: #ffffff;
            font-weight: 600; /* Adjust font weight if needed */
        }

        .user-info .user-name {
            margin-left: 0.5rem; /* Space between "สวัสดี" and the user's name */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <div class="logo-divider"></div>
                <div class="logo-text">
                    <span class="main-title">ระบบจัดการคลังอะไหล่รถยนต์อู่สิทธา</span><br>
                </div>
            </a>
            <div class="date-time" id="date-time"></div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex flex-column align-items-end">
                        @auth
                            <span class="navbar-text user-info">
                                สวัสดี <span class="user-name">{{ Auth::user()->name }}</span>
                            </span>
                        @else
                            <span class="navbar-text user-info"></span>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2024 SITTHA GARAGE. All Rights Reserved.</p>
    </footer>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
            document.getElementById('date-time').textContent = now.toLocaleString('en-GB', options);
        }

        // Update date and time every second
        setInterval(updateDateTime, 1000);

        // Initial call to set date and time immediately
        updateDateTime();
    </script>
</body>

</html>
