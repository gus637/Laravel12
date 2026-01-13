<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Webshop</title>
    <!-- Vite voor CSS/JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal" style="min-height: 100vh">

<!-- Navigatie -->
<nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="font-bold text-xl">Webshop</a>
        <div>
            <a href="{{ route('home') }}" class="mr-4">Home</a>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</nav>

<!-- Content -->
<main class="container mx-auto mt-8 px-4">
    @yield('content')
</main>

<footer class="bg-gray-800 text-white text-center p-4 mt-12">
    © 2025 Mijn Webshop
</footer>

</body>
</html>
