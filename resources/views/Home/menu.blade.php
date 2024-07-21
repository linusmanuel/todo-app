<header class="home__header">
    <div class="container">
        <a href="#" class="logo">🚀 Todoapp</a>
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
            <a href="{{ route('todos.index') }}" class="">
                Ir para todo
            </a>
            @else
            <a href="{{ route('login') }}" class="btn-default">
                Entrar
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn-default btn-last">
                Registar
            </a>
            @endif
            @endauth
        </nav>
        @endif
    </div>
</header>
