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
                        <h4>Editar tarefa</h4>
                        <form method="post" action="{{ route('todos.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                            <div class="mb-3">
                                <label class="form-label">Nome da tarefa</label>
                                <input type="text" class="form-control" name="title" placeholder="Informe o nome da tarefa" value="{{ $todo->title }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição</label>
                                <textarea class="form-control" name="description" cols="5" rows="5">{{ $todo->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="is_completed" class="form-control">
                                    <option disabled selected>Selecionar</option>
                                    <option value="1">Completo</option>
                                    <option value="0">Incompleto</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Atualizar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
