@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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

                    @if (count($todos) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Status</th>
                                <th scope="col">Ação</th>
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
                                <td class="group">
                                    <a class="inner btn btn-sm btn-success" href="">Edit</a>
                                    <a class="inner btn btn-sm btn-info" href="{{route('todos.show', $todo->id)}}">Ver</a>
                                    <form action="">
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
@endsection
