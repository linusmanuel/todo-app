<x-app-layout>
    <div class="container">
        @if(Session::has('alert-success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('alert-success') }}
        </div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif

        @if(Session::has('alert-info'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('alert-info') }}
        </div>
        @endif

        <h1>Gerencie suas tarefas</h1>
        <p>Esteja organizado...</p>
        <a href="{{ route('todos.create') }}" class="card">Criar nova tarefa</a>
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
                    <i class="fa-solid fa-heart-circle-exclamation"></i>
                    @endif
                </div>
            </div>
            @empty
            @endforelse
            @else
            <p>Não existem tarefas criadas</p>
            @endif
        </div>
    </div>
</x-app-layout>
