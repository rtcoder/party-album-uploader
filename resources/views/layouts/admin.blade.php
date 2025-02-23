<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admina</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav>
    <a href="{{ route('albums.index') }}">Albumy</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Wyloguj</button>
    </form>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>
