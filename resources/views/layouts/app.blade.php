<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Todo App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
<?php // @include('layouts.navigation')
?>

<body class="min-h-screen flex justify-center items-center">
    <div class="app">

        <!-- Page Heading -->
        <aside class="app__aside">
            <div>
                Perfil
                descrição
            </div>
        </aside>

        <!-- Page Content -->
        <main class="app__body">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
