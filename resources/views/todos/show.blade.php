<x-app-layout>
    <div class="container todo-show">
        @if(Session::has('alert-success'))
        @include('todos.components.alert-success')
        @endif

        @if(Session::has('error'))
        @include('todos.components.alert-danger')
        @endif

        @if(Session::has('alert-info'))
        @include('todos.components.alert-info')
        @endif

        <a href="{{ route('todos.index')}}">
            <i class="fa-solid fa-tent-arrow-turn-left pb-4" style="color: #ffffff;"></i>
        </a>
        <div class="cards">
            <div class="card">
                <h2 class="card__title">
                    Nome da tarefa: {{ $todo->title }}
                </h2>
            </div>
            <div class="card__inner">
                <p class="card">
                    {{ $todo->description }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
