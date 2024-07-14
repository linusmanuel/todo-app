<header class="home__header">
    <div class="container">
        <img class="" src="" /> Logo
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
            <a href="{{ route('todos.index') }}" class="">
                Ir para todo
            </a>
            @else
            <a href="{{ route('login') }}" class="">
                Entrar
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="">
                Registar
            </a>
            @endif
            @endauth
        </nav>
        @endif
    </div>
</header>
