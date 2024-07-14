<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home Todos</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
</head>

<body class="">
    @include('home.menu')
    <main class="">
        @include('home.hero')
        <section class="home__about">
            About
        </section>
    </main>

    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
        &copy; 2024 - Todos direitos reservados,Desenvolvido com ❤️💙 por João Lino | Enployer at An Tecnology as FullStack Developer
    </footer>
</body>

</html>
