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
</x-app-layout>
