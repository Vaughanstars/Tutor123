<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Vite CSS -->
    @vite('resources/css/app.css')

    <!-- Livewire CSS -->
    @livewireStyles
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    {{ $slot ?? '' }}

    <!-- Livewire JS -->
    @livewireScripts

    <!-- If using Vite JS, include here too -->
    @vite('resources/js/app.js')
</body>
</html>
