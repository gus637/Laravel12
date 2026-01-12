<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles
</head>
<body>
<flux:sidebar>...</flux:sidebar>

<flux:main>
    {{ $slot }} <!-- Hier komt de inhoud -->
</flux:main>

@fluxScripts
</body>
</html>
