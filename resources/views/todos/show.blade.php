@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todo App</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Voltar</a>
                    <h4>Ver tarefa</h4>
                    Nome da tarefa: {{ $todo->title }}
                    Descrição da tarefa: {{ $todo->description }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
