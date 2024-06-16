<x-app-layout>
    <div class="container todo-index">
        @if(Session::has('alert-success'))
        @include('todos.components.alert-success')
        @endif

        @if(Session::has('error'))
        @include('todos.components.alert-danger')
        @endif

        @if(Session::has('alert-info'))
        @include('todos.components.alert-info')
        @endif

        <div class="todo-index__header">
            <h1>Gerencie suas tarefas</h1>
            <p class="todo-index__description">Esteja organizado!</p>
        </div>
        <a href="{{ route('todos.create') }}" class="card todo-index__create">
            Criar nova tarefa
            <i class="fa-solid fa-heart-circle-plus"></i>
        </a>
        <div class="cards">
            @if (count($todos) > 0)
            @forelse($todos as $todo)
            <div class="card">
                <div class="card__actions">
                    <form method="post" action="{{ route('todos.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <button class="btn btn--delete"></button>
                    </form>
                    <a class="btn btn--show" href="{{route('todos.show', $todo->id)}}"></a>
                    <a class="btn btn--update" href="{{route('todos.edit', $todo->id)}}"></a>
                </div>
                <h2 class="card__title">
                    {{$todo->title}}
                </h2>
                <div class="card__status">
                    @if ($todo->is_completed == 1)
                    <i class="fa-solid fa-heart-circle-check"></i>
                    @else
                    <i class="fa-solid fa-heart-circle-xmark"></i>
                    @endif
                </div>
            </div>
            @empty
            @endforelse
            @else
            <p class="todo-index__todo-not-found">
                Não existem tarefas criadas
                <i class="fa-solid fa-heart-circle-xmark"></i>
            </p>
            @endif
        </div>
    </div>
</x-app-layout>
