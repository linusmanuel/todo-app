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

<body class="md:min-h-screen md:flex md:justify-center md:items-center">
    <div class="app">
        <!-- Page Heading -->
        <aside class="app__aside">
            <div class="aside__profile">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center border-transparent text-sm leading-4 font-medium  text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
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
                        <i class="fa-solid fa-heart-circle-check" style="color: #ca8bfe;"></i>
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
