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

        <div class="cards">
            @if (count($todos) > 0)
            <div class="card">
                @forelse($todos as $todo)
                <div class="card__actions">
                    <a class="btn btn--update" href="{{route('todos.edit', $todo->id)}}"></a>
                    <a class="btn btn--show" href="{{route('todos.show', $todo->id)}}"></a>
                    <form method="post" action="{{ route('todos.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <button class="btn btn--delete"></button>
                    </form>
                </div>
                <h2 class="card__title">
                    {{$todo->title}}
                </h2>
                <div class="card__status">
                    @if ($todo->is_completed == 1)
                    <a class="" href="">Completed</a>
                    @else
                    <a class="" href="">in Completed</a>
                    @endif
                </div>
                @empty
                @endforelse
            </div>
            @else
            <p>Não existem tarefas criadas</p>
            <a href="{{ route('todos.create') }}" class="btn btn-info">Criar nova tarefa</a>
            @endif
        </div>
    </div>
</x-app-layout>
