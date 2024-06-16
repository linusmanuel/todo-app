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

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>
<?php // @include('layouts.navigation')
?>

<body class="min-h-screen flex justify-center items-center">
    <div class="app">

        <!-- Page Heading -->
        <aside class="app__aside">
            <div class="aside__profile">
                Perfil
                descrição
            </div>
            <div class="aside__todo-tags">
                <h3>
                    <i class="fa-solid fa-heart-circle-exclamation"></i>
                    Todos tags
                </h3>
                <ul>
                    <li>
                        <span class="btn btn--delete"></span>
                        <span>Deletar</span>
                    </li>
                    <li>
                        <span class="btn btn--show"></span>
                        <span>Visualizar</span>
                    </li>
                    <li>
                        <span class="btn btn--update"></span>
                        <span>Atualizar</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-heart-circle-check"></i>
                        <span>Completo</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-heart-circle-xmark"></i>
                        <span>Imcompleto</span>
                    </li>
                </ul>

            </div>
        </aside>

        <!-- Page Content -->
        <main class="app__body" data-app-body>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
