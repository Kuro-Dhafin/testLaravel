<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IndieArt Market</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <a class="navbar-brand" href="/">IndieArt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <form action="{{ route('services.search') }}" method="GET" class="d-flex ms-auto me-3" style="max-width:300px;">
            <input class="form-control me-2" type="search" name="keyword" placeholder="Search services..." value="{{ request('keyword') }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <ul class="navbar-nav">
            @auth
                @if(auth()->user()->role === 'artist')
                    <li class="nav-item"><a class="nav-link" href="/services/create">Upload Jasa</a></li>
                @endif

                @if(auth()->user()->role === 'admin')
                    <li class="nav-item"><a class="nav-link" href="/admin">Admin</a></li>
                @endif

                <li class="nav-item">
                    <form method="POST" action="/logout">@csrf
                        <button class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
            @endauth
        </ul>
    </div>
</nav>

@if(auth()->check() && auth()->user()->role === 'buyer')
<div class="text-center mt-2">
    <form method="POST" action="/upgrade/artist">@csrf
        <button class="btn btn-warning">Upgrade to Artist</button>
    </form>
</div>
@endif

<div class="container mt-3">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
</div>

<div class="container mt-4">
    @yield('content')
</div>

@include('layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
