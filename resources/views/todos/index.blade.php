<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight btn btn-info">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-slate-500">{{ __('Dashboard') }}</div>

                    <div class="card-body">
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
                        <a href="{{ route('todos.create') }}" class="btn btn-info">Criar nova tarefa</a>
                        @if (count($todos) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Ação</th>
                                    oi
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($todos as $todo)
                                <tr>
                                    <td>{{$todo->title}}</td>
                                    <td>{{$todo->description}}</td>
                                    <td>
                                        @if ($todo->is_completed == 1)
                                        <a class="btn btn-sm btn-success" href="">Completed</a>
                                        @else
                                        <a class="btn btn-sm btn-danger" href="">in Completed</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="inner btn btn-sm btn-success" href="{{route('todos.edit', $todo->id)}}">Edit</a>
                                        <a class="inner btn btn-sm btn-info" href="{{route('todos.show', $todo->id)}}">Ver</a>
                                        <form method="post" action="{{ route('todos.destroy') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        @else
                        <td>Nothing to display</td>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
