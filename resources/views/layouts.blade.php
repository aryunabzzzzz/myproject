<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #4682B4;">
    <div class="container">
        @guest
            <a class="navbar-brand mr-auto" href="{{ route('main') }}">My Journey</a>
        @else
            <a class="navbar-brand mr-auto" href="{{ route('profile', ['nickname'=>Auth::user()->nickname]) }}">My Journey</a>
        @endguest
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">LogIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Followers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Following</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trips') }}">MyTrips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">LogOut</a>
                    </li>

                    <form action="{{ route('search') }}" method="GET">
                        <input type="search" placeholder="Search..." id="search" class="form-control" name="search" autofocus>
                        <button class="btn btn-primary" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart-fill" viewBox="0 0 16 16">
                                <path d="M6.5 13a6.47 6.47 0 0 0 3.845-1.258h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1A6.47 6.47 0 0 0 13 6.5 6.5 6.5 0 0 0 6.5 0a6.5 6.5 0 1 0 0 13m0-8.518c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018"/>
                            </svg>
                        </button>
                    </form>

                @endguest
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-5">
    @yield('content')
</div>
</body>
</html>
